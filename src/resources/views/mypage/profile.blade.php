@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header')

@section('main')
<div>
    <div>プロフィール設定</div>
    <div>
        <span>プロフィールアイコン</span>
        <button class="button" type="submit">画像を選択する</button>
    </div>
    <div>ユーザー名</div>
    <div><input type="text" name="username" value="{{ old('username') }}"></div>
    <div>郵便番号</div>
    <div><input type="text" name="postcode" value="{{ old('postcode') }}"></div>
    <div>住所</div>
    <div><input type="text" name="address" value="{{ old('address') }}"></div>
    <div>建物名</div>
    <div><input type="text" name="building" value="{{ old('building') }}"></div>
    <div><button class="button" type="submit">更新する</button></div>
</div>
@endsection