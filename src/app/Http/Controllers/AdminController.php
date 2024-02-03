<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // ログイン画面表示
    public function getAdminLogin()
    {
        return view('admin.auth.login');
    }

    // ログイン処理
    public function postAdminLogin(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('viewAdmin')->with([
                'login_ttl' => '成功', 'login_msg' => 'ログインしました',
            ]);
        } else {
            return redirect()->route('getAdminLogin')->with([
                'login_ttl' => '失敗', 'login_msg' => 'ログインに失敗しました',
            ]);
        }
    }

    //　管理者画面表示
    public function viewAdmin()
    {
        return view('admin.admin');
    }
}
