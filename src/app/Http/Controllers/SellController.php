<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellRequest;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Storage;

class SellController extends Controller
{
    // 出品画面表示
    public function getSell()
    {
        if (!auth()->check()) {
            return redirect()->route('getLogin')->with(
                'flashWarning', 'このページを表示するにはログインが必要です',
            );
        }
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $conditions = Condition::all();
        return view('sell', compact('categories', 'subcategories', 'conditions'));
    }

    // 出品登録処理
    public function postSell(SellRequest $request)
    {
        // 商品の画像を保存し、そのURLを取得
        $itemUrl = $this->storeItemImage($request->file('item_url'));
        // 出品情報を新規作成、保存
        Item::create([
            'seller_id' => auth()->user()->id,
            'category_id' => $request->input('category_id'),
            'subcategory_id' => $request->input('subcategory_id'),
            'condition_id' => $request->input('condition_id'),
            'itemname' => $request->input('itemname'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'item_url' => $itemUrl,
        ]);
        return redirect()->route('getMypage')->with(
            'flashSuccess', '出品処理されました',
        );
    }

    private function storeItemImage($file)
    {
        $dir = 'item'; // ディレクトリ名
        $file_name = uniqid() . '.' . $file->getClientOriginalName(); // ファイル名を生成
        $file_path = $file->storeAs('public/' . $dir, $file_name); // ファイルを保存
        return Storage::url($file_path); // 保存したファイルのURLを返す
    }
}
