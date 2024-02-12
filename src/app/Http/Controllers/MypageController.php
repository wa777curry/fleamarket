<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function getMypage()
    {
        // ログインしているユーザーのプロフィール情報の取得
        $profile = auth()->user()->profile;
        // 現在のユーザーの出品アイテムを取得
        $sellerItems = Item::where('seller_id', auth()->id())->get();
        // 現在のユーザーが購入したアイテムを取得
        $purchaserItems = Item::where('purchaser_id', auth()->id())->get();

        return view('mypage', compact('profile', 'sellerItems', 'purchaserItems'));
    }
}
