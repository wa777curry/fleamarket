@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header')

@section('main')
<div class="panel__content">
    <div class="panel__main">
        <div class="panel__menu">
            <span class="content__menu"><a href="{{route('index') }}?search={{ $query }}">おすすめ</a></span>
            @if(auth()->check())
            <span class="content__menu active">マイリスト</span>
            @endif
            <span class="content__menu"><a href="{{ route('search') }}?search={{ $query }}">検索結果</a></span>
        </div>
        <hr>
        <!-- マイリスト一覧の表示 -->
        <div class="content" id="likes">
            <div class="content__img">
                @if(Auth::check())
                @if($likes->isEmpty())
                <p>マイリスト登録した商品はありません</p>
                @else
                @foreach($likes as $like)
                <a href="{{ route('item', ['id' => $like->id]) }}">
                    <img src="{{ $like->item_url }}" alt="{{ $like->itemname }}">
                </a>
                @endforeach
                @endif
                @endif
            </div>
        </div>
        <div class="paginate">
            {{ $likes->appends(request()->query())->links() }}
        </div>
    </div>
</div>

@endsection