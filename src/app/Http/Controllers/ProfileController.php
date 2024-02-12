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

    // プロフィール登録処理
    public function postProfile(ProfileRequest $request)
    {
        // ログインしているユーザーのプロフィール情報の取得
        $user = auth()->user();
        $profile = $user->profile;
        // プロフィールが存在しない場合は新規に作成する
        if (!$profile) {
            $profile = new Profile();
            $profile->user_id = $user->id;
        }
        // アイコンの画像を保存し、そのURLを取得
        $iconUrl = $this->storeIconImage($request->file('icon_url'));
        // プロフィール情報を更新する
        $profile->fill([
            'username' => $request->input('username'),
            'postcode' => $request->input('postcode'),
            'address' => $request->input('address'),
            'building' => $request->input('building'),
            'icon_url' => $iconUrl,
        ]);
        $profile->save();
        return redirect()->route('getMypage')->with([
            'flash_ttl' => '成功', 'flash_msg' => 'プロフィールが更新されました',
        ]);
    }

    private function storeIconImage($file)
    {
        // アップロードされたアイコンを保存する処理
        if ($file) {
            $dir = 'icon'; // ディレクトリ名
            $file_extension = $file->getClientOriginalExtension(); // ファイルの拡張子を取得する
            $file_name = auth()->id() . '_999_' . 'icon' . '.' . $file_extension; // ファイル名に拡張子を連結する
            $file_path = $file->storeAs('public/' . $dir, $file_name); // ファイルを保存
            return Storage::url($file_path); // 保存したファイルのURLを返す
        }
        return null; // アップロードされたファイルがない場合はnullを返す
    }
}
