<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Comment;
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
        $users = User::paginate(10);
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

    // 管理者画面表示
    public function commentList()
    {
        $comments = Comment::paginate(10);
        return view('admin.comment-list', compact('comments'));
    }

    // 一般ユーザーのコメント削除処理
    public function deleteUserComment($id)
    {
        $comments = Comment::find($id);
        $comments->delete();
        return redirect()->route('commentList')->with(
            'flashSuccess', 'コメントを削除しました'
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
