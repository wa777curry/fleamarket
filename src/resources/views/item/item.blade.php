@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header')

@section('main')
<div class="item__content">
    <div class="item__content--main">
        <div class="item__content--left">
            <img src="{{ $item->item_url }}" alt="{{ $item->itemname }}">
        </div>
        <div class="item__content--right">
            <div>
                <h2>{{ $item->itemname }}</h2>
                <h3 style="font-weight: normal;">¥{{ $formattedPrice }}(値段)</h3>
            </div>
            <div class="item__content--icon">
                <!-- ログイン時のお気に入りアイコン表示 -->
                @if(Auth::check())
                @if(auth()->user()->likes->contains($item->id))
                <!-- お気に入り登録済みの場合 -->
                <form action="{{ route('nolike', $item) }}" method="post">
                    @csrf
                    <button type="submit">
                        <div><i class="fa fa-star fa-fw"></i></div>
                        <div>
                            <h5>{{ $item->likes->count() }}</h5>
                        </div>
                    </button>
                </form>
                @else
                <!-- お気に入り未登録の場合 -->
                <form action="{{ route('like', $item) }}" method="post">
                    @csrf
                    <button type="submit">
                        <div><i class="fa fa-star-o fa-fw"></i></div>
                        <div>
                            <h5>{{ $item->likes->count() }}</h5>
                        </div>
                    </button>
                </form>
                @endif
                <!-- 非ログイン時のお気に入りアイコン表示 -->
                @else
                <form action="{{ route('like', $item) }}" method="post">
                    @csrf
                    <button type="submit">
                        <div><i class="fa fa-star-o fa-fw"></i></div>
                        <div>
                            <h5>{{ $item->likes->count() }}</h5>
                        </div>
                    </button>
                </form>
                @endif
                <!-- コメントアイコン表示 -->
                <a href="{{ route('getComment', ['id' => $item->id]) }}">
                    <button type="submit">
                        <div><i class="fa fa-comments-o fa-fw"></i></div>
                        <div>
                            <h5>{{ $item->comments->count() }}</h5>
                        </div>
                    </button>
                </a>
            </div>
            <div>
                @if(auth()->check() && $item->seller_id == auth()->id())
                    <p class="alert alert-danger">出品者のため、購入することはできません</p>
                @elseif($itemPurchased)
                    <p class="alert alert-danger">売り切れです</p>
                @elseif(auth()->check())
                    <a href="{{ route('getPurchase', ['id' => $item->id]) }}">
                        <button type="submit">購入する</button>
                    </a>
                @else
                    <a href="{{ route('getPurchase', ['id' => $item->id]) }}">
                        <button type="submit">ログインして購入する</button>
                    </a>
                @endif
            </div>
            <div>
                <h3>商品説明</h3>
                <h5>{{ $item->description }}</h5>
            </div>
            <div>
                <h3>商品の情報</h3>
            </div>
            <div class="item__content--category">
                <h5>
                    <div class="item__content--category-text">カテゴリー</div>
                    <div class="item__content--category-tag">{{ $item->category->category }}</div>
                    <div class="item__content--category-tag">{{ $item->subcategory->subcategory }}</div>
                </h5>
            </div>
            <div class="item__content--category">
                <h5>
                    <div class="item__content--category-text">商品の状態</div>
                    <div class="item__content--category-tag">{{ $item->condition->condition }}</div>
                </h5>
            </div>
        </div>
    </div>
</div>
@endsection