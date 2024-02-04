@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header')

@section('main')
<div>
    <div>プロフィール設定</div>
    <form action="{{ route('postProfile') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="icon-content">
            <!-- アイコン設定が存在しない場合、デフォルトのアイコンを表示 -->
            @if(!$profile->icon_url)
            <div class="icon"><img src="{{ Storage::url('icon/default.png') }}"></div>
            @else
            <!-- プロフィールアイコンの表示 -->
            <div class="icon"><img src="{{ url($profile->icon_url) }}" alt="Profile Icon"></div>
            @endif
            <button class="button" type="button" onclick="document.getElementById('fileInput').click()">画像を選択する</button>
            <input type="file" name="icon" id="fileInput" onchange="previewImage(event)" style="display: none;" accept="image/*">
        </div>
        <div class="form__error">
            @error('icon_url')
            {{ $message }}
            @enderror
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