@extends('layouts.app')

@section('css')
@endsection

@include('admin.layouts.header2')

@section('main')
<div class="form__content">
    <div class="form__main">
        <div>
            <h2>管理者ログイン</h2>
        </div>
        <form action="{{ route('postAdminLogin') }}" method="post">
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
    </div>
</div>
@endsection