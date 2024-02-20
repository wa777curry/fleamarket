<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\View;

class ItemController extends Controller
{
    // 商品詳細画面表示
    public function getItem($id)
    {
        $item = Item::find($id);
        // 金額をフォーマットしてビューに渡す
        $formattedPrice = number_format($item->price);
        // 閲覧回数をカウント
        $this->countView($id);
        return view('item.item', compact('item', 'formattedPrice'));
    }

    // 商品の閲覧回数をカウントする
    private function countView($itemId)
    {
        // ログインしているかどうかを確認
        if (auth()->check()) {
            // ログインユーザーのIDを取得
            $userId = auth()->id();
            // 該当するアイテムの閲覧ログを取得
            $viewLog = View::where('user_id', $userId)
            ->where('item_id', $itemId)
            ->first();
            // ログが既に存在する場合は、閲覧回数を更新して最終閲覧時刻を更新
            if ($viewLog) {
                $viewLog->increment('view_count');
                $viewLog->update(['last_viewed_at' => now()]);
            } else {
                // ログが存在しない場合は新しいログを作成
                View::create([
                    'user_id' => $userId,
                    'item_id' => $itemId,
                    'view_count' => 1,
                    'last_viewed_at' => now(),
                ]);
            }
        }
    }
}
