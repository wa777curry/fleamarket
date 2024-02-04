@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header')

@section('main')
<div>
    <div>プロフィール設定</div>
    <form action="{{ route('postProfile') }}" method="post">
        @csrf
        <div>
            <span>プロフィールアイコン</span>
            <button class="button" type="submit">画像を選択する</button>
        </div>
        <div>ユーザー名</div>
        <div><input type="text" name="username" value="{{ old('username', $profile->username ?? '') }}"></div>
        <div class="form__error">
            @error('username')
            {{ $message }}
            @enderror
        </div>
        <div>郵便番号</div>
        <div><input type="text" name="postcode" value="{{ old('postcode', $profile->postcode ?? '') }}"></div>
        <div class="form__error">
            @error('postcode')
            {{ $message }}
            @enderror
        </div>
        <div>住所</div>
        <div><input type="text" name="address" value="{{ old('address', $profile->address ?? '') }}"></div>
        <div class="form__error">
            @error('address')
            {{ $message }}
            @enderror
        </div>
        <div>建物名</div>
        <div><input type="text" name="building" value="{{ old('building', $profile->building ?? '') }}"></div>
        <div><button class="button" type="submit">更新する</button></div>
    </form>
</div>
@endsection