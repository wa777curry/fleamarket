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
        $query = $request->input('search');

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
        $recommendItems = $recommendItems->paginate(12);

        return view('index', compact('query', 'recommendItems', 'sortOrder'));
    }

    // マイリスト一覧の表示
    public function mylist(Request $request)
    {
        $query = $request->input('search');

        $likes = null;
        if (Auth::check()) {
            $likes = auth()->user()->likes()->paginate(12);
        }

        return view('mylist', compact('query', 'likes'));
    }

    // 検索結果の取得
    public function search(Request $request)
    {
        $query = $request->input('search');

        // 商品名やカテゴリー名に検索クエリが含まれる商品を取得
        if (!$query) {
            $results = collect(); // 空のコレクションを返す
        } else {
            $results = Item::where('itemname', 'like', '%' . $query . '%')
                ->orWhereHas('category', function ($queryBuilder) use ($query) {
                    $queryBuilder->where('category', 'like', '%' . $query . '%');
                })
                ->orWhereHas('subcategory', function ($queryBuilder) use ($query) {
                    $queryBuilder->where('subcategory', 'like', '%' . $query . '%');
                })
            ->paginate(12);
        }
        return view('search', compact('results', 'query'));
    }
}
