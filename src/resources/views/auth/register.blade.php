@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header2')

@section('main')
<div>
    <div>会員登録</div>
    <div>メールアドレス</div>
    <div><input type="email" name="email" value="{{ old('email') }}"></div>
    <div>パスワード</div>
    <div><input type="password" name="password"></div>
    <div><button class="button" type="submit">登録する</button></div>
    <div><a href=/auth/login>ログインはこちら</a></div>
</div>
@endsection