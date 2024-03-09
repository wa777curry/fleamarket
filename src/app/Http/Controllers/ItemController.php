<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Purchase;
use App\Models\View;

class ItemController extends Controller
{
    // 商品詳細画面表示
    public function item($id)
    {
        $item = Item::find($id);

        $isLoggedIn = auth()->check();
        // 自分が出品者の場合
        $isSeller = $isLoggedIn && $item->seller_id == auth()->id();
        // 自分が購入済みの場合
        $isPurchased = $isLoggedIn && $item->purchases()->where('user_id', auth()->id())->exists();
        // 自分以外が購入済みの場合
        $itemPurchased = Purchase::where('item_id', $id)->exists();

        // 金額をフォーマットしてビューに渡す
        $formattedPrice = number_format($item->price);
        // 閲覧回数をカウント
        $this->countView($id);
        return view('item.item', compact('item', 'isLoggedIn', 'isSeller', 'isPurchased', 'itemPurchased', 'formattedPrice'));
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
