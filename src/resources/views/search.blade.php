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
            <span class="content__menu"><a href="{{ route('mylist') }}?search={{ $query }}">マイリスト</a></span>
            @endif
            <span class="content__menu active">検索結果</span>
        </div>
        <hr>
        <!-- 　検索結果一覧の表示 -->
        <div class="content" id="search">
            <div class="content__img">
                @if(!$results->isEmpty())
                @foreach($results as $result)
                <a href="{{ route('item', ['id' => $result->id]) }}">
                    <img src="{{ $result->item_url }}" alt="{{ $result->itemname }}">
                </a>
                @endforeach
                @endif
                @if($results->isEmpty())
                <p>ここには検索結果が表示されます</p>
                @endif
            </div>
        </div>
        @if($results instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
        <div class="paginate">
            {{ $results->appends(request()->query())->links() }}
        </div>
        @endif
    </div>
</div>

@endsection