<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Item;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    // トップ画面表示
    public function index(Request $request)
    {
        // マイリスト一覧の表示
        $likes = null;
        if (Auth::check()) {
            $likes = auth()->user()->likes;
        }

        // おすすめ一覧の表示
        $recommendItems = Item::query();
        // プルダウンメニューからの選択を取得
        $sortOrder = $request->input('sort');

        // 全ユーザーの閲覧回数が多い順
        if ($sortOrder === 'views') {
            $itemViews = View::select('item_id', DB::raw('SUM(view_count) as total_views'))
            ->groupBy('item_id');
            // アイテムの閲覧件数をアイテムと結合して取得
            $recommendItems = Item::leftJoinSub($itemViews, 'item_views', function ($join) {
                $join->on('items.id', '=', 'item_views.item_id');
            })
            ->select('items.*', 'item_views.total_views')
            ->having('total_views', '>', 0) // 閲覧回数が0より大きい場合のみ表示
            ->orderByDesc('item_views.total_views');
        // 全ユーザーのマイリストが多い順
        } elseif ($sortOrder === 'likes') {
            $recommendItems = $recommendItems->leftJoin('likes', 'items.id', '=', 'likes.item_id')
            ->select('items.*', DB::raw('count(likes.id) as likes_count'))
            ->groupBy('items.id')
            ->having('likes_count', '>', 0) // マイリスト件数が0より大きい場合のみ表示
            ->orderBy('likes_count', 'desc');
        // 価格が安い順
        } elseif ($sortOrder === 'asc') {
            $recommendItems = $recommendItems->orderBy('price', 'asc');
        // 価格が高い順
        } elseif ($sortOrder === 'desc') {
            $recommendItems = $recommendItems->orderBy('price', 'desc');
        }
        $recommendItems = $recommendItems->take(12)->get();

        return view('index', compact('likes', 'recommendItems', 'sortOrder'));
    }



    public function getComment()
    {
        return view('item.comment');
    }

    public function address()
    {
        return view('purchase.address.item');
    }

    public function purchase()
    {
        return view('purchase.item');
    }

    public function upload(Request $request)
    {
        // ディレクトリ名
        $dir = 'item';
        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();
        // 取得したファイル名で保存
        // storage/app/public/任意のディレクトリ名/
        $request->file('image')->storeAs('public/' . $dir, $file_name);
        // ファイル情報をDBに保存
        $image = new Image();
        $image->imagename = $file_name;
        $image->path = 'storage/' . $dir . '/' . $file_name;
        $image->save();

        return redirect('/');
    }
}
