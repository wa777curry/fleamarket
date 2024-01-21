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
    <div>名前アイコン　名前</div>
    <div>コメント内容</div>
    <div>名前アイコン　名前</div>
    <div>コメント内容</div>
    <div>名前アイコン　名前</div>
    <div>コメント内容</div>
    <div>商品へのコメント</div>
    <div><textarea name="comment">{{ old('comment') }}</textarea></div>
    <div><button class="button" type="submit">コメントを送信する</button></div>
</div>
@endsection