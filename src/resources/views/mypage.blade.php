@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header')

@section('main')
<div>
    <!-- ユーザー情報部分 -->
    <div class="user-content">
        <div class="icon-content">
            <!-- プロフィール設定がない場合、デフォルトのアイコンを表示 -->
            @if(!$profile)
            <div class="icon"><img src="{{ Storage::url('icon/default.png') }}"></div>
            @else
            <!-- プロフィールアイコンの表示 -->
            <div class="icon"><img src="{{ url($profile->icon_url) }}" alt="Profile Icon"></div>
            @endif
            <div>{{ $profile->username ?? 'ユーザー名未設定' }}</div>
        </div>
        <div class="icon-content">
            <a href="{{ route('getProfile') }}"><button class="button" type="submit">プロフィールを編集</button></a>
        </div>
    </div>

    <!-- 商品表示部分 -->
    <div>
        <span class="content__menu" onclick="toggleContent('sells')">出品した商品</span>
        <span class="content__menu" onclick="toggleContent('purchases')">購入した商品</span>
    </div>
    <div class="content active" id="sells">
        <div class="content__img">
            <!-- あとでｆｏｒｅａｃｈに置換 -->
            <img src="{{ Storage::url('image/noimage.jpg') }}" alt="出品画像">
            <img src="{{ Storage::url('image/noimage.jpg') }}" alt="出品画像">
            <img src="{{ Storage::url('image/noimage.jpg') }}" alt="出品画像">
            <img src="{{ Storage::url('image/noimage.jpg') }}" alt="出品画像">
            <img src="{{ Storage::url('image/noimage.jpg') }}" alt="出品画像">
        </div>
    </div>
    <div class="content" id="purchases">
        <div class="content__img">
            <!-- あとでｆｏｒｅａｃｈに置換 -->
            <img src="{{ Storage::url('image/noimage.jpg') }}" alt="購入画像">
            <img src="{{ Storage::url('image/noimage.jpg') }}" alt="購入画像">
            <img src="{{ Storage::url('image/noimage.jpg') }}" alt="購入画像">
            <img src="{{ Storage::url('image/noimage.jpg') }}" alt="購入画像">
            <img src="{{ Storage::url('image/noimage.jpg') }}" alt="購入画像">
            <img src="{{ Storage::url('image/noimage.jpg') }}" alt="購入画像">
        </div>
    </div>
</div>
@endsection