<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\Email;
use Illuminate\Http\Request;


class MailController extends Controller
{
    public function mail()
    {
        return view('admin.mail');
    }

    public function postMail(Request $request)
    {
        // メールを送信する
        Mail::to($request->email)->send(new Email($request->subject, $request->message));

        // 送信後に適切なリダイレクトなどを行う

        return redirect()->back()->with('success', 'メールを送信しました');
    }
}
