<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function comment()
    {
        return view('item.comment');
    }

    public function item()
    {
        return view('item.item');
    }

    public function profile()
    {
        return view('mypage.profile');
    }

    public function address()
    {
        return view('purchase.address.item');
    }

    public function purchase()
    {
        return view('purchase.item');
    }

    public function mypage()
    {
        return view('mypage');
    }

    public function sell()
    {
        return view('sell');
    }
}
