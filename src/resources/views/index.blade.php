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
    <li><a href="/auth/login">ログインページ</a></li>
    <li><a href="/auth/register">会員登録ページ</a></li>
    <li><a href="/item/comment">コメントページ</a></li>
    <li><a href="/item/item">商品詳細ページ</a></li>
    <li><a href="/mypage/profile">プロフィール編集画面</a></li>
    <li><a href="/purchase/address/item">住所変更ページ</a></li>
    <li><a href="/purchase/item">購入ページ</a></li>
    <li><a href="/mypage">マイページ</a></li>
    <li><a href="/sell">出品ページ</a></li>
</div>
@endsection