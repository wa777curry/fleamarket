<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // ログイン画面表示
    public function getLogin()
    {
        return view('auth.login');
    }

    // ログイン処理
    public function postLogin(Request $request)
    {
        $accepts = $request->only('email', 'password');

        if (Auth::attempt($accepts)) {
            return redirect()->route('index');
        }
        // 認証に失敗した場合
        return back()->withErrors([
            'login_error_msg' => ['ログインに失敗しました'],
        ]);
    }
}