<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeliveryRequest;
use App\Models\Delivery;
use App\Models\Item;
use App\Models\Payment;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    // 購入画面表示
    public function getPurchase($id)
    {
        $item = Item::find($id);
        if ($item->seller_id == auth()->id()) {
            return redirect()->route('getItem', ['id' => $id])->with(
                'flashWarning', '出品者のため、購入することはできません'
            );
        }
        // ログインユーザーのデリバリー情報を取得
        $delivery = auth()->user()->delivery()->first();
        // 金額をフォーマットしてビューに渡す
        $formattedPrice = number_format($item->price);
        // 支払方法情報の取得
        $payments = Payment::all();
        return view('purchase.item', compact('item', 'delivery', 'formattedPrice', 'payments'));
    }

    // 購入登録処理
    public function postPurchase(Request $request, $id)
    {
        // フォームデータから情報を取得
        $userId = auth()->user()->id;
        $itemId = $id;
        $delivery = auth()->user()->delivery;
        // 配送先が存在しない場合と支払方法が選択されていない場合のエラーメッセージをセット
        $errors = [];
        if (!$delivery) {
            $errors['delivery'] = '※配送先を指定してください';
        }
        $paymentId = $request->input('payment_id');
        if (!$paymentId) {
            $errors['payment'] = '※支払い方法を選択してください';
        }
        // エラーメッセージがある場合はリダイレクト
        if (!empty($errors)) {
            return redirect()->back()->withInput()->withErrors($errors);
        }
        $deliveryId = $delivery->id;
        // 購入情報の保存
        $purchase = new Purchase();
        $purchase->user_id = $userId;
        $purchase->item_id = $itemId;
        $purchase->delivery_id = $deliveryId;
        $purchase->payment_id = $paymentId;
        $purchase->save();

        return redirect()->route('thanks')->with(
            'flashSuccess', '購入が完了しました'
        );
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

    // 購入完了画面示
    public function thanks()
    {
        return view('thanks');
    }
}
