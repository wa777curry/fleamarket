@extends('layouts.app')

@section('css')
@endsection

@include('admin.layouts.header')

@section('main')
<div class="form__content">
    <div class="form__main">
        <form action="{{ route('postMail') }}" method="post">
            @csrf
            <div>
                <h4>登録ユーザー名</h4>
                {{ optional($user->profile)->username ?? 'ユーザー名未設定' }}
            </div>
            <div>
                <h4>送信先メールアドレス</h4>
                <input type="email" id="email" name="email" value="{{ $user->email ?? old('email') }}">
            </div>
            <div>
                <h4>件名</h4>
                <input type="text" id="subject" name="subject" value="{{ old('subject') }}">
            </div>
            <div class="form__error">
                @error('subject')
                {{ $message }}
                @enderror
            </div>
            <div>
                <h4>メッセージ</h4>
                <textarea id="message" name="message">{{ old('message') }}</textarea>
            </div>
            <div class="form__error">
                @error('message')
                {{ $message }}
                @enderror
            </div>
            <div><button type="submit">送信する</button></div>
        </form>
    </div>
</div>
@endsection