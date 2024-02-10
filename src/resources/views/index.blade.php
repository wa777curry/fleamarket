@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header')

@section('main')
<div>
    <span class="content__menu" onclick="toggleContent('recommends')">おすすめ</span>
    @if(auth()->check())
    <span class="content__menu" onclick="toggleContent('likes')">マイリスト</span>
    @endif
</div>
<div class="content active" id="recommends">
    <div class="content__img">
        <!-- あとでｆｏｒｅａｃｈに置換 -->
        <img src="{{ Storage::url('item/sneakers-red.jpg') }}" alt="おすすめ画像">
        <img src="{{ Storage::url('item/boots-brown.jpg') }}" alt="おすすめ画像">
        <img src="{{ Storage::url('item/pumps-black2.jpg') }}" alt="おすすめ画像">
        <img src="{{ Storage::url('item/noimage.jpg') }}" alt="おすすめ画像">
        <img src="{{ Storage::url('item/noimage.jpg') }}" alt="おすすめ画像">
        <img src="{{ Storage::url('item/noimage.jpg') }}" alt="おすすめ画像">
    </div>
</div>
<div class="content" id="likes">
    <div class="content__img">
        <!-- あとでｆｏｒｅａｃｈに置換 -->
        <img src="{{ Storage::url('item/noimage.jpg') }}" alt="マイリスト画像">
        <img src="{{ Storage::url('item/noimage.jpg') }}" alt="マイリスト画像">
        <img src="{{ Storage::url('item/noimage.jpg') }}" alt="マイリスト画像">
    </div>
</div>

<div>
    ページリンク一覧
    <li><a href="/login">ログインページ</a></li>
    <li><a href="/register">会員登録ページ</a></li>
    <li><a href="/item/comment">コメントページ</a>　※ログインしないと表示不可</li>
    <li><a href="/item/item">商品詳細ページ</a></li>
    <li><a href="/mypage/profile">プロフィール編集画面</a>　※ログインしないと表示不可</li>
    <li><a href="/purchase/address/item">住所変更ページ</a>　※ログインしないと表示不可</li>
    <li><a href="/purchase/item">購入ページ</a>　※ログインしないと表示不可</li>
    <li><a href="/mypage">マイページ</a>　※ログインしないと表示不可</li>
    <li><a href="/sell">出品ページ</a>　※未ログインなら画面誘導？</li>
    <li><a href="/admin/login">管理者ログインページ</a></li>
</div>

<form method="post" action="/upload" enctype="multipart/form-data">
    @csrf
    <div style="display: flex; width: 500px;">
        <input type="file" name="image">
        <button style="width: 200px;">アップロード</button>
    </div>
</form>

@endsection