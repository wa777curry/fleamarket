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
        $item->comments = Comment::orderBy('created_at', 'desc')->get();
        $defaultIconUrl = Storage::url('icon/default.png'); // デフォルトのアイコンURL
        return view('comment.comment', compact('item', 'formattedPrice', 'defaultIconUrl'));
    }

    // 商品コメント投稿処理
    public function postComment(CommentRequest $request, $id)
    {
        // コメントを保存
        Comment::create([
            'item_id' => $id,
            'user_id' => auth()->id(),
            'comment' => $request->input('comment'),
        ]);
        return redirect()->back()->with(
            'flashSuccess', 'コメントが投稿されました'
        );
    }
}
