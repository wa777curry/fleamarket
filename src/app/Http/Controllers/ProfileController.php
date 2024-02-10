<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // プロフィール設定画面表示
    public function getProfile()
    {
        // プロフィール情報がある場合は情報を取得
        $profile = auth()->user()->profile;
        return view('mypage.profile', compact('profile'));
    }

    //　プロフィール登録処理
    public function postProfile(ProfileRequest $request)
    {
        // ログインしているユーザーのプロフィール情報の取得
        $profile = auth()->user()->profile;
        // プロフィールが存在しない場合は新規に作成する
        if (!$profile) {
            $profile = new Profile();
            $profile->user_id = auth()->user()->id;
        }
        // アップロードされたアイコンを保存する処理
        if ($request->hasFile('icon')) {
            // ディレクトリ名
            $dir = 'icon';
            // アップロードされたファイルを取得
            $file = $request->file('icon');
            // ファイル名を生成
            $file_extension = $file->getClientOriginalExtension(); // ファイルの拡張子を取得する
            $file_name = auth()->id() . '_999_' . 'icon' . '.' . $file_extension; // ファイル名に拡張子を連結する
            // ファイルを保存
            $file_path = $file->storeAs('public/' . $dir, $file_name);
            // プロフィールのアイコンURLを更新
            $profile->icon_url = Storage::url($file_path);
        }
        // プロフィール情報を更新する
        $profile->fill($request->validated());
        $profile->save();

        return redirect()->route('getMypage')->with([
            'flash_ttl' => '成功', 'flash_msg' => 'プロフィールが更新されました',
        ]);
    }
}
