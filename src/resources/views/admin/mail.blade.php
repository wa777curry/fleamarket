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
                <h4>送信先メールアドレス</h4>
                <input type="email" id="email" name="email">
            </div>
            <div>
                <h4>件名</h4>
                <input type="text" id="subject" name="subject">
            </div>
            <div>
                <h4>メッセージ</h4>
                <textarea id="message" name="message"></textarea>
            </div>
            <div><button type="submit">送信</button></div>
        </form>
    </div>
</div>
@endsection
