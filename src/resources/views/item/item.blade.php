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
            <h2>{{ $item->itemname }}</h2>
            <div>
                <h3 style="font-weight: normal;">¥{{ $formattedPrice }}(値段)</h3>
            </div>
            <div class="item__content--icon">
                <!-- ログイン時の表示 -->
                @if(Auth::check())
                @if(auth()->user()->likes->contains($item->id))
                <!-- お気に入り登録済みの場合 -->
                <form action="{{ route('nolike', $item) }}" method="post">
                    @csrf
                    <button class="like-on" type="submit">
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
                    <button class="like-off" type="submit">
                        <div><i class="fa fa-star-o fa-fw"></i></div>
                        <div>
                            <h5>{{ $item->likes->count() }}</h5>
                        </div>
                    </button>
                </form>
                @endif
                <a href="{{ route('getComment', ['id' => $item->id]) }}">
                    <button class="comment" type="submit">
                        <div><i class="fa fa-comments-o fa-fw"></i></div>
                        <div>
                            <h5>{{ $item->comments->count() }}</h5>
                        </div>
                    </button>
                </a>
                <!-- 非ログイン時の表示 -->
                @else
                <form action="{{ route('like', $item) }}" method="post">
                    @csrf
                    <button class="comment" type="submit">
                        <div><i class="fa fa-star-o fa-fw"></i></div>
                    </button>
                    {{ $item->likes->count() }}
                </form>
                <div><i class="fa fa-comments-o fa-fw"></i></div>
                {{ $item->comments->count() }}
                @endif
            </div>
            <div>
                <a href="{{ route('getPurchase', ['id' => $item->id]) }}">
                    <button class="button" type="submit">購入する</button>
                </a>
            </div>
            <div>
                <h3>商品説明</h3>
                <h5>{{ $item->description }}</h5>
            </div>
            <div>
                <h3>商品の情報</h3>
            </div>
            <div class="item__content--category">
                <div class="item__content--category-text">カテゴリー</div>
                <div class="item__content--category-tag">{{ $item->category->category }}</div>
                <div class="item__content--category-tag">{{ $item->subcategory->subcategory }}</div>
            </div>
            <div class="item__content--category">
                <div class="item__content--category-text">商品の状態</div>
                <div class="item__content--category-tag">{{ $item->condition->condition }}</div>
            </div>
        </div>
    </div>
</div>
@endsection