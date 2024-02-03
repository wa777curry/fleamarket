<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // ログイン画面表示
    public function getAdminLogin()
    {
        return view('admin.auth.login');
    }

    // ログイン処理
    public function postAdminLogin(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('viewAdmin')->with(
                'login_msg', 'ログインしました',
            );
        }
    }

    //　管理者画面表示
    public function viewAdmin()
    {
        return view('admin.admin');
    }
}
