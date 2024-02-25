@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header')

@section('main')
<div>
    <span class="content__menu" onclick="toggleContent('recommends')">おすすめ</span>
    @if(auth()->check())
    <span class="content__menu" onclick="toggleContent('likes')">マイリスト</span>
    @endif
    <span class="content__menu" onclick="toggleContent('search')">検索結果</span>
</div>
<!-- おすすめ一覧の表示 -->
<div class="content active" id="recommends">
    <div>
        <form action="{{ route('index') }}" method="get">
            <select name="sort" id="sort" onchange="this.form.submit()">
                <option value="">選択してください　</option>
                <option value="views" {{ $sortOrder === 'views' ? 'selected' : '' }}>閲覧回数が多い順　</option>
                <option value="likes" {{ $sortOrder === 'likes' ? 'selected' : '' }}>マイリストが多い順　</option>
                <option value="asc" {{ $sortOrder === 'asc' ? 'selected' : '' }}>価格が安い順　</option>
                <option value="desc" {{ $sortOrder === 'desc' ? 'selected' : '' }}>価格が高い順　</option>
            </select>
        </form>
    </div>
    <div class="content__img">
        @foreach($recommendItems as $item)
        <a href="{{ route('getItem', ['id' => $item->id]) }}">
            <img src="{{ $item->item_url }}" alt="{{ $item->itemname }}">
        </a>
        @endforeach
    </div>
</div>
<!-- マイリスト一覧の表示 -->
<div class="content" id="likes">
    <div class="content__img">
        @if(Auth::check())
        @if($likes->isEmpty())
        <p>マイリスト登録した商品はありません。</p>
        @else
        @foreach($likes as $like)
        <a href="{{ route('getItem', ['id' => $like->id]) }}">
            <img src="{{ $like->item_url }}" alt="{{ $like->itemname }}">
        </a>
        @endforeach
        @endif
        @endif
    </div>
</div>


<div>
    ページリンク一覧
    <li><a href="/comment">コメントページ</a>　※ログインしないと表示不可</li>
    <li><a href="/admin/login">管理者ログインページ</a></li>
</div>

<form method="post" action="/upload" enctype="multipart/form-data">
    @csrf
    <div style="display: flex; width: 500px;">
        <input type="file" name="image">
        <button style="width: 200px;">アップロード</button>
    </div>
</form>

<script src="{{ asset('js/panel.js') }}"></script>
@endsection