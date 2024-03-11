<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
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
    public function postAdminLogin(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('viewAdmin')->with(
                'flashSuccess', 'ログインしました',
            );
        } else {
            return redirect()->route('getAdminLogin')->with(
                'flashError', 'ログインに失敗しました',
            );
        }
    }

    // 管理者画面表示
    public function viewAdmin()
    {
        $users = User::all();
        return view('admin.admin', compact('users'));
    }

    // 一般ユーザーの削除処理
    public function deleteAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('viewAdmin')->with(
            'flashSuccess', 'ユーザーを削除しました'
        );
    }

    // ログアウト関連
    public function logout()
    {
        Auth::logout();
        return redirect()->route('getAdminLogin')->with(
            'flashSuccess', 'ログアウトしました',
        );
    }
}
