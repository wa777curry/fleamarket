@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header')

@section('main')
<div>
    <div>
        <span>ユーザーアイコン</span>
        <span>ユーザー名</span>
        <a href="{{ route('getProfile') }}"><button class="button" type="submit">プロフィールを編集</button></a>
    </div>
    <div>
        <span>出品した商品</span>
        <span>購入した商品</span>
    </div>
    <div>
        画像
    </div>
</div>
@endsection