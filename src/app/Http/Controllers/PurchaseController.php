<?php

namespace App\Http\Controllers;

use App\Models\Item;

class PurchaseController extends Controller
{
    // 購入画面表示
    public function getPurchase($id)
    {
        if (!auth()->check()) {
            return redirect()->route('getLogin')->with(
                'flashWarning', 'このページを表示するにはログインが必要です',
            );
        }
        $item = Item::find($id);
        // 金額をフォーマットしてビューに渡す
        $formattedPrice = number_format($item->price);
        return view('purchase.item', compact('item', 'formattedPrice'));
    }
}
