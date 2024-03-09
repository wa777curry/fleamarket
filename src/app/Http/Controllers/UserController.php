<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    // ログイン画面表示
    public function login()
    {
        return view('auth.login');
    }

    // ログイン処理
    public function postLogin(LoginRequest $request)
    {
        $accepts = $request->only('email', 'password');
        // ログイン前のURLをセッションに保存
        $request->session()->put('previous_url', URL::previous());

        if (Auth::attempt($accepts)) {
            return redirect()->intended(route('index'))->with(
                'flashSuccess',
                'ログインしました',
            );
        } else {
            return redirect()->route('login')->with(
                'flashError',
                'ログインに失敗しました',
            );
        }
    }

    // 会員登録画面表示
    public function register()
    {
        return view('auth.register');
    }

    // 会員登録処理
    public function postRegister(RegisterRequest $request)
    {
        User::create([
            'admin_id' => 1,
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect()->route('index')->with(
            'flashSuccess',
            '登録しました',
        );
    }

    // ログアウト関連
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index')->with(
            'flashSuccess',
            'ログアウトしました',
        );
    }
}
