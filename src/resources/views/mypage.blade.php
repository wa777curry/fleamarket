@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header')

@section('main')
<div>
    <div class="user-content">
        <div class="icon-content">
            <!-- アイコン設定が存在しない場合、デフォルトのアイコンを表示 -->
            @if(!$profile->icon_url)
            <div class="icon"><img src="{{ Storage::url('icon/default.png') }}"></div>
            @else
            <!-- プロフィールアイコンの表示 -->
            <div class="icon"><img src="{{ url($profile->icon_url) }}" alt="Profile Icon"></div>
            @endif
            <div>{{ $profile->username }}</div>
        </div>
        <div class="icon-content">
            <a href="{{ route('getProfile') }}"><button class="button" type="submit">プロフィールを編集</button></a>
        </div>
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