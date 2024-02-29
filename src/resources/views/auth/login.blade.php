@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header2')

@section('main')
<div class="form__content">
    <div class="form__main">
        <div>
            <h2>ログイン</h2>
        </div>
        <form action="{{ route('postLogin') }}" method="post">
            @csrf
            <div>
                <h4>メールアドレス</h4>
                <input type="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
            </div>
            <div>
                <h4>パスワード</h4>
                <input type="password" name="password">
            </div>
            <div class="form__error">
                @error('password')
                {{ $message }}
                @enderror
            </div>
            <div><button class="button" type="submit">ログインする</button></div>
        </form>
        <div>
            <h5><a href="/register">会員登録はこちら</a></h5>
        </div>
    </div>
</div>
@endsection