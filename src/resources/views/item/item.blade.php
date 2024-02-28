@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header')

@section('main')
<div>
    <img src="{{ $item->item_url }}" alt="{{ $item->itemname }}">
</div>
<div>
    <div>{{ $item->itemname }}</div>
    <div>{{ $formattedPrice }}</div>
    <div>
        <!-- ログイン時の表示 -->
        @if(Auth::check())
        @if(auth()->user()->likes->contains($item->id))
        <!-- お気に入り登録済みの場合 -->
        <form action="{{ route('nolike', $item) }}" method="post">
            @csrf
            <button type="submit">
                <img src="{{ Storage::url('image/like.svg') }}">
            </button>
            {{ $item->likes->count() }}
        </form>
        @else
        <!-- お気に入り未登録の場合 -->
        <form action="{{ route('like', $item) }}" method="post">
            @csrf
            <button type="submit">
                <img src="{{ Storage::url('image/like.svg') }}">
            </button>
            {{ $item->likes->count() }}
        </form>
        @endif
        <a href="{{ route('getComment', ['id' => $item->id]) }}"><img src="{{ Storage::url('image/comment.svg') }}"></a> {{ $item->comments->count() }}
        <!-- 非ログイン時の表示 -->
        @else
        <form action="{{ route('like', $item) }}" method="post">
            @csrf
            <button type="submit">
                <img src="{{ Storage::url('image/like.svg') }}">
            </button>
            {{ $item->likes->count() }}
        </form>
        <img src="{{ Storage::url('image/comment.svg') }}"> {{ $item->comments->count() }}
        @endif
    </div>
    <div>
        <a href="{{ route('getPurchase', ['id' => $item->id]) }}">
            <button class="button" type="submit">購入する</button>
        </a>
    </div>
    <div>商品説明</div>
    <div>{{ $item->description }}</div>
    <div>商品の情報</div>
    <div>
        <span>カテゴリー</span>
        <span>{{ $item->category->category }}</span>
        <span>{{ $item->subcategory->subcategory }}</span>
    </div>
    <div>
        <span>商品の状態</span>
        <span>{{ $item->condition->condition }}</span>
    </div>
</div>
@endsection