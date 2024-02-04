@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header2')

@section('main')
<div>
    <div>会員登録</div>
    <form action="{{ route('postRegister') }}" method="post">
        @csrf
        <div>メールアドレス</div>
        <div><input type="email" name="email" value="{{ old('email') }}"></div>
        <div class="form__error">
            @error('email')
            {{ $message }}
            @enderror
        </div>
        <div>パスワード</div>
        <div><input type="password" name="password"></div>
        <div class="form__error">
            @error('password')
            {{ $message }}
            @enderror
        </div>
        <div><button class="button" type="submit">登録する</button></div>
    </form>
    <div><a href=/login>ログインはこちら</a></div>
</div>
@endsection