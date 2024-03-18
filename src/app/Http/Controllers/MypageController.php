<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Purchase;


class MypageController extends Controller
{
    // 出品した商品の画面表示
    public function mypage()
    {
        // ログインしているユーザーのプロフィール情報の取得
        $profile = auth()->user()->profile;
        // 現在のユーザーの出品商品を取得
        $sellerItems = Item::where('seller_id', auth()->id())->paginate(12);
        $defaultIconUrl = url('img/icon/default.png'); // デフォルトのアイコンURL
        return view('mypage', compact('profile', 'sellerItems', 'defaultIconUrl'));
    }

    // 購入した商品の画面表示
    public function purchase()
    {
        // ログインしているユーザーのプロフィール情報の取得
        $profile = auth()->user()->profile;
        // 現在のユーザーが購入した商品を取得
        $purchaserItems = Purchase::where('user_id', auth()->id())->paginate(12);
        $defaultIconUrl = url('img/icon/default.png'); // デフォルトのアイコンURL
        return view('purchase', compact('profile', 'purchaserItems', 'defaultIconUrl'));
    }
}
