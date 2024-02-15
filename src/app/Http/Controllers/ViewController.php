<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $likes = null;
        if (auth()->check())
        {
            $likes = auth()->user()->likes;
        }
        return view('index', compact('likes'));
    }

    public function getComment()
    {
        return view('item.comment');
    }

    public function address()
    {
        return view('purchase.address.item');
    }

    public function purchase()
    {
        return view('purchase.item');
    }

    public function upload(Request $request)
    {
        // ディレクトリ名
        $dir = 'item';
        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();
        // 取得したファイル名で保存
        // storage/app/public/任意のディレクトリ名/
        $request->file('image')->storeAs('public/' . $dir, $file_name);
        // ファイル情報をDBに保存
        $image = new Image();
        $image->imagename = $file_name;
        $image->path = 'storage/' . $dir . '/' . $file_name;
        $image->save();

        return redirect('/');
    }
}
