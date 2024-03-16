<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Mail\Email;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    // メール送信画面表示
    public function mail($id)
    {
        $user = User::find($id);
        return view('admin.mail', compact('user'));
    }

    // メール送信処理
    public function postMail(MailRequest $request)
    {
        $data = $request->all();
        // メールを作成して送信
        Mail::to($data['email'])->send(new Email($data));

        return redirect()->route('admin')->with(
            'flashSuccess', 'メールを送信しました'
        );
    }
}
