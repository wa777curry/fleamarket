<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // 商品詳細画面表示
    public function getItem($id)
    {
        $item = Item::find($id);
        // 金額をフォーマットしてビューに渡す
        $formattedPrice = number_format($item->price);
        return view('item.item', compact('item', 'formattedPrice'));
    }
}
