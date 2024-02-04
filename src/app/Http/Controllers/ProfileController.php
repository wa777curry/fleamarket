<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;

class ProfileController extends Controller
{
    // プロフィール設定画面表示
    public function getProfile()
    {
        $user = auth()->user();
        $profile = $user->profile; // プロフィール情報を取得
        return view('mypage.profile', compact('user', 'profile'));
    }

    public function postProfile(ProfileRequest $request)
    {
        // ログインしているユーザーのプロフィール情報の取得
        $profile = auth()->user()->profile;
        // プロフィールが存在しない場合は新規作成する
        if (!$profile){
            $profile = new Profile();
            $profile->user_id = auth()->user()->id;
        }
        // プロフィール情報を更新する
        $profile->fill($request->validated());
        $profile->save();

        return redirect()->route('getProfile')->with([
            'flash_ttl' => '成功', 'flash_msg' => 'プロフィールが更新されました',
        ]);
    }
}
