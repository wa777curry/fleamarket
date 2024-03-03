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
            <!-- コメント関連 -->
            <div class="comment__content">
                @if($item->comments->isEmpty())
                <p>コメントはまだありません。</p>
                @else
                @foreach($item->comments as $comment)
                <div class="comment__content--main {{ $comment->user_id == auth()->id() ? 'right' : 'left' }}">
                    <!-- 自分のコメントの場合・右寄せ表示 -->
                    @if($comment->user_id == auth()->id())
                    <h5>{{ auth()->user()->profile->username ?? 'ユーザー名未設定' }}</h5>
                    <!-- プロフィール設定がない場合、デフォルトのアイコンを表示 -->
                    @if(!$comment->userProfile or !$comment->userProfile->icon_url)
                    <img src="{{ $defaultIconUrl }}">
                    @else
                    <!-- プロフィールアイコンの表示 -->
                    <img src="{{ $comment->userProfile->icon_url }}" alt="Profile Icon">
                    @endif
                    <!-- 自分以外のコメントの場合・左寄せ表示 -->
                    @else
                    <!-- プロフィール設定がない場合、デフォルトのアイコンを表示 -->
                    @if(!$comment->userProfile or !$comment->userProfile->icon_url)
                    <img src="{{ $defaultIconUrl }}">
                    @else
                    <!-- プロフィールアイコンの表示 -->
                    <img src="{{ $comment->userProfile->icon_url }}" alt="Profile Icon">
                    @endif
                    <h5>{{ $comment->userProfile->username ?? 'ユーザー名未設定' }}</h5>
                    @endif
                </div>
                <div class="comment__content--text">
                    <h5>{!! nl2br(e($comment->comment)) !!}</h5>
                    <!-- コメントの投稿日時 -->
                    <h6><time datetime="{{ $comment->created_at }}">{{ $comment->created_at->format('Y-m-d H:i') }}</time></h6>
                    <!-- 自分のコメントの場合は削除ボタンを表示 -->
                    @if(auth()->check() && $comment->user_id === auth()->id())
                    <div>
                        <form action="{{ route('deleteComment', $comment->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">
                                <i class="fa fa-trash-o fa-fg"></i>
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
                @endforeach
                @endif
            </div>
            <div>
                <form action="{{ route('postComment', ['id' => $item->id]) }}" method="post">
                    @csrf
                    <h4>商品へのコメント</h4>
                    @if(auth()->check())
                    <textarea name="comment">{{ old('comment') }}</textarea>
                    <div class="form__error">
                        @error('comment')
                        {{ $message }}
                        @enderror
                    </div>
                    <button type="submit">コメントを送信する</button>
                    @else
                    <button type="submit">コメントの送信にはログインが必要です</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection