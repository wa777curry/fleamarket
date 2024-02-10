<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellRequest;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;
use Illuminate\Support\Facades\Storage;

class SellController extends Controller
{
    // 出品画面表示
    public function getSell()
    {
        $sell = Item::all();
        $categories = Category::all();
        $conditions = Condition::all();
        return view('sell', compact('sell', 'categories', 'conditions'));
    }

    //　出品登録処理
    public function postSell(SellRequest $request)
    {
        $sell = new Item();
        // アップロードされたアイコンを保存する処理
        if ($request->hasFile('item')) {
            // ディレクトリ名
            $dir = 'item';
            // アップロードされたファイルを取得
            $file = $request->file('item');
            // ファイル名を生成
            $file_name = uniqid() . '.' . $file->getClientOriginalName();
            // ファイルを保存
            $file_path = $file->storeAs('public/' . $dir, $file_name);
            // プロフィールのアイコンURLを更新
            $sell->icon_url = Storage::url($file_path);
        }
        //　その他出品情報を更新する
        $sell->fill($request->validated());
        $sell->save();

        return redirect()->route('getSell')->with([
            'flash_ttl' => '成功', 'flash_msg' => '出品処理されました',
        ]);
    }
}
