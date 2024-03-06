<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Purchase;
use Illuminate\Support\Facades\Storage;


class MypageController extends Controller
{
    // マイページ画面表示
    public function mypage()
    {
        // ログインしているユーザーのプロフィール情報の取得
        $profile = auth()->user()->profile;
        // 現在のユーザーの出品商品を取得
        $sellerItems = Item::where('seller_id', auth()->id())->get();
        $defaultIconUrl = Storage::url('icon/default.png'); // デフォルトのアイコンURL
        return view('mypage', compact('profile', 'sellerItems', 'defaultIconUrl'));
    }

    // マイページ画面表示
    public function purchase()
    {
        // ログインしているユーザーのプロフィール情報の取得
        $profile = auth()->user()->profile;
        // 現在のユーザーが購入した商品を取得
        $purchaserItems = Purchase::where('user_id', auth()->id())->get();
        $defaultIconUrl = Storage::url('icon/default.png'); // デフォルトのアイコンURL
        return view('purchase', compact('profile', 'purchaserItems', 'defaultIconUrl'));
    }
}
