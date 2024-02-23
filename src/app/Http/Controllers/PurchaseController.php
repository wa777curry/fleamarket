<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeliveryRequest;
use App\Models\Delivery;
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
        // ログインユーザーのデリバリー情報を取得
        $delivery = auth()->user()->delivery()->first();
        // 金額をフォーマットしてビューに渡す
        $formattedPrice = number_format($item->price);
        return view('purchase.item', compact('item', 'delivery', 'formattedPrice'));
    }

    // 配送先画面表示
    public function getAddress($id)
    {
        $item = Item::find($id);
        // ユーザーのデリバリー情報を取得
        $delivery = auth()->user()->delivery()->first();
        // 未登録の場合はnullにする
        $notData = ($delivery === null);
        return view('purchase.address.item', compact('item', 'delivery', 'notData'));
    }

    // 配送先登録処理
    public function postAddress(DeliveryRequest $request, $id)
    {
        // 配送先情報の取得
        $user = auth()->user();
        $delivery = $user->delivery()->first();
        // 配送先情報が存在しない場合は新規に作成する
        if (!$delivery) {
            $delivery = new Delivery();
            $delivery->user_id = $user->id;
        }
        // 配送先情報の更新
        $delivery->fill([
            'postcode' => $request->input('postcode'),
            'address' => $request->input('address'),
            'building' => $request->input('building'),
        ]);
        $delivery->save();

        return redirect()->route('getPurchase', ['id' => $id])->with(
            'flashSuccess', '配送先情報が更新されました',
        );
    }
}
