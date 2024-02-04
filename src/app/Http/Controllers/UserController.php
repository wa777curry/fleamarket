<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // ログイン画面表示
    public function getLogin()
    {
        return view('auth.login');
    }

    // ログイン処理
    public function postLogin(LoginRequest $request)
    {
        $accepts = $request->only('email', 'password');

        if (Auth::attempt($accepts)) {
            return redirect()->route('index')->with([
                'flash_ttl' => '成功', 'flash_msg' => 'ログインしました',
            ]);
        } else {
            return redirect()->route('getLogin')->with([
                'flash_ttl' => '失敗', 'flash_msg' => 'ログインに失敗しました',
            ]);
        }
    }

    // 会員登録画面表示
    public function getRegister()
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
        return redirect()->route('index')->with([
            'flash_ttl' => '成功', 'flash_msg' => '登録しました',
        ]);
    }

    // ログアウト関連
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index')->with([
            'flash_ttl' => '成功', 'flash_msg' => 'ログアウトしました',
        ]);
    }
}
