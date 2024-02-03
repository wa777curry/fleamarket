@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header2')

@section('main')
<div>
    <div>ログイン</div>
    <form action="{{ route('postLogin') }}" method="post">
        @csrf
        <div>メールアドレス</div>
        <div><input type="email" name="email" value="{{ old('email') }}"></div>
        <div>パスワード</div>
        <div><input type="password" name="password"></div>
        <div><button class="button" type="submit">ログインする</button></div>
    </form>
    <div><a href="/auth/register">会員登録はこちら</a></div>
</div>
@endsection