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
                <img src="{{ Storage::url('image/on-like.jpg') }}">
            </button>
            {{ $item->likes->count() }}
        </form>
        @else
        <!-- お気に入り未登録の場合 -->
        <form action="{{ route('like', $item) }}" method="post">
            @csrf
            <button type="submit">
                <img src="{{ Storage::url('image/off-like.jpg') }}">
            </button>
            {{ $item->likes->count() }}
        </form>
        @endif
        <a href="{{ route('getComment', ['id' => $item->id]) }}"><img src="{{ Storage::url('image/on-comment.jpg') }}"></a> {{ $item->comments->count() }}
        <!-- 非ログイン時の表示 -->
        @else
        <form action="{{ route('like', $item) }}" method="post">
            @csrf
            <button type="submit">
                <img src="{{ Storage::url('image/off-like.jpg') }}">
            </button>
            {{ $item->likes->count() }}
        </form>
        <span><img src="{{ Storage::url('image/off-comment.jpg') }}"> {{ $item->comments->count() }}</span>
        @endif
    </div>
</div>
<div>
    @if($item->comments->isEmpty())
        <p>コメントはまだありません。</p>
    @else
        @foreach($item->comments as $comment)
            <div class="icon-content2">
                <!-- 自分のコメントかどうかを判断 -->
                @if($comment->user_id == auth()->id())
                    <div>{{ auth()->user()->profile->username ?? 'ユーザー名未設定' }}</div>
                    <!-- プロフィール設定がない場合、デフォルトのアイコンを表示 -->
                    @if(!$comment->userProfile or !$comment->userProfile->icon_url)
                        <div class="icon2"><img src="{{ $defaultIconUrl }}"></div>
                    @else
                        <!-- プロフィールアイコンの表示 -->
                        <div class="icon2"><img src="{{ $comment->userProfile->icon_url }}" alt="Profile Icon"></div>
                    @endif
                @else
                    <!-- プロフィール設定がない場合、デフォルトのアイコンを表示 -->
                    @if(!$comment->userProfile or !$comment->userProfile->icon_url)
                        <div class="icon2"><img src="{{ $defaultIconUrl }}"></div>
                    @else
                        <!-- プロフィールアイコンの表示 -->
                        <div class="icon2"><img src="{{ $comment->userProfile->icon_url }}" alt="Profile Icon"></div>
                    @endif
                    <div>{{ $comment->userProfile->username ?? 'ユーザー名未設定' }}</div>
                @endif
            </div>
            <div>{{ $comment->comment }}</div>
            <!-- 自分のコメントであれば削除ボタンを表示 -->
            <div>
                @if(auth()->check() && $comment->user_id === auth()->id())
                    <form action="{{ route('deleteComment', $comment->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">削除</button>
                    </form>
                @endif
            </div>
        @endforeach
    @endif
</div>
<div>商品へのコメント</div>
    <form action="{{ route('postComment', ['id' => $item->id]) }}" method="post">
        @csrf
        <div><textarea name="comment">{{ old('comment') }}</textarea></div>
        <div class="form__error">
            @error('comment')
            {{ $message }}
            @enderror
        </div>
        <div><button class="button" type="submit">コメントを送信する</button></div>
    </form>
</div>
@endsection