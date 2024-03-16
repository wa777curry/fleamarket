@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header')

@section('main')
<div class="panel__content">
    <div class="panel__main">
        <!-- ユーザー情報部分 -->
        <div class="user__content">
            <div class="icon">
                <!-- プロフィール設定がない場合、デフォルトのアイコンを表示 -->
                @if(!$profile or !$profile->icon_url)
                <img src="{{ $defaultIconUrl }}">
                @else
                <!-- プロフィールアイコンの表示 -->
                <img src="{{ $profile->icon_url }}" alt="Profile Icon">
                @endif
                <h3>{{ $profile->username ?? 'ユーザー名未設定' }}</h3>
            </div>
            <div class="icon">
                <a href="{{ route('profile') }}"><button class="button" type="submit">プロフィールを編集</button></a>
            </div>
        </div>
        <!-- 商品表示部分 -->
        <div class="panel__menu">
            <span class="content__menu"><a href="{{ route('mypage') }}">出品した商品</a></span>
            <span class="content__menu active"><a>購入した商品</a></span>
        </div>
        <hr>
        <!-- 購入商品一覧の表示 -->
        <div class="content" id="purchases">
            <div class="content__img">
                @if($purchaserItems->isEmpty())
                <p>購入した商品はありません</p>
                @else
                @foreach($purchaserItems as $item)
                <a href="{{ route('comment', ['id' => $item->item_id]) }}">
                    <img src="{{ $item->item->item_url }}" alt="{{ $item->item->itemname }}">
                </a>
                @endforeach
                @endif
            </div>
        </div>
        <div class="paginate">
            {{ $purchaserItems->links() }}
        </div>
    </div>
</div>

@endsection