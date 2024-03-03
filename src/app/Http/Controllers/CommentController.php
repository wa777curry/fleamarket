<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Item;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // 商品コメント画面表示
    public function getComment($id)
    {
        $item = Item::find($id);
        // 金額をフォーマットしてビューに渡す
        $formattedPrice = number_format($item->price);
        // コメントを作成日時で降順に取得
        $comments = Comment::where('item_id', $item->id)
            ->orderBy('created_at', 'desc')->get();
        $defaultIconUrl = Storage::url('icon/default.png'); // デフォルトのアイコンURL
        return view('comment.comment', compact('item', 'comments', 'formattedPrice', 'defaultIconUrl'));
    }

    // 商品コメント投稿処理
    public function postComment(CommentRequest $request, $id)
    {
        if (!auth()->check()) {
            return redirect()->route('getLogin')->with(
                'flashWarning', 'この機能を有効にするにはログインが必要です',
            );
        }
        // コメントを保存
        Comment::create([
            'item_id' => $id,
            'user_id' => auth()->id(),
            'comment' => $request->input('comment'),
        ]);
        // リクエスト元のURLが存在する場合はそこにリダイレクトし、存在しない場合はデフォルトのURLにリダイレクトする
        $previousUrl = $request->session()->pull('previous_url', route('defaultRoute'));
        return redirect($previousUrl)->with(
            'flashSuccess', 'コメントが投稿されました'
        );
    }

    public function deleteComment($id)
    {
        // コメントを取得
        $comment = Comment::find($id);
        // コメントが存在するか、またログインしているユーザーがコメントの所有者であるかを確認
        if (!$comment || $comment->user_id !== auth()->id()) {
            return redirect()->back()->with(
                'flashError', 'コメントを削除する権限がありません'
            );
        }
        // コメントを削除
        $comment->delete();
        return redirect()->back()->with(
            'flashSuccess', 'コメントが削除されました'
        );
    }
}
