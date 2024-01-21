@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header')

@section('main')
<div>
    商品画像
</div>
<div>
    <div>商品名</div>
    <div>ブランド名</div>
    <div>値段</div>
    <div>
        <span>お気に入りアイコン</span>
        <span>コメントアイコン</span>
    </div>
    <div><button class="button" type="submit">購入する</button></div>
    <div>商品説明</div>
    <div>商品の概要</div>
    <div>商品の情報</div>
    <div>
        <span>カテゴリー</span>
        <span>カテ１</span>
        <span>カテ２</span>
    </div>
    <div>
        <span>商品の状態</span>
        <span>良好</span>
    </div>
</div>
@endsection