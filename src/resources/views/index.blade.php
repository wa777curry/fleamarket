@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header')

@section('main')
<div>
    <span>おすすめ</span>
    <span>マイリスト</span>
</div>
<div>
    画像
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

<div>
    <form method="post" action="/upload" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <button>アップロード</button>
    </form>
</div>

@endsection