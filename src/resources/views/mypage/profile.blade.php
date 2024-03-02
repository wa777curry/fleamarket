@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header')

@section('main')
<div class="form__content">
    <div class="form__main">
        <div>
            <h2>プロフィール設定</h2>
        </div>
        <form action="{{ route('postProfile') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="icon">
                <!-- プロフィール設定がない場合、デフォルトのアイコンを表示 -->
                @if(!$profile or !$profile->icon_url)
                <img src="{{ $defaultIconUrl }}">
                @else
                <!-- プロフィールアイコンの表示 -->
                <img src="{{ $profile->icon_url }}" alt="Profile Icon">
                @endif
                <button class="button" type="button" onclick="document.getElementById('fileInput').click()">画像を選択する</button>
                <input type="file" name="icon_url" id="fileInput" onchange="previewImage(event)" style="display: none;" accept="image/*">
            </div>
            <div class="form__error">
                @error('icon_url')
                {{ $message }}
                @enderror
            </div>
            <div>
                <h4>ユーザー名</h4>
                <input type="text" name="username" value="{{ old('username', $profile->username ?? '') }}">
            </div>
            <div class="form__error">
                @error('username')
                {{ $message }}
                @enderror
            </div>
            <div>
                <h4>郵便番号</h4>
                <input type="text" name="postcode" value="{{ old('postcode', $profile->postcode ?? '') }}">
            </div>
            <div class="form__error">
                @error('postcode')
                {{ $message }}
                @enderror
            </div>
            <div>
                <h4>住所</h4>
                <input type="text" name="address" value="{{ old('address', $profile->address ?? '') }}">
            </div>
            <div class="form__error">
                @error('address')
                {{ $message }}
                @enderror
            </div>
            <div>
                <h4>建物名</h4>
                <input type="text" name="building" value="{{ old('building', $profile->building ?? '') }}">
            </div>
            <div><button class="button" type="submit">更新する</button></div>
        </form>
    </div>
</div>
<script src="{{ asset('js/icon.js') }}"></script>
@endsection