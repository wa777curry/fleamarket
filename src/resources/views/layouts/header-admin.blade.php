@section('header')
<a href="/"><img src="/storage/image/logo.svg"></a>
<div>
    @if (Auth::check())
        <!-- ログイン時の表示 -->
        <span><a href="{{ url('logout') }}">ログアウト</a></span>
    @else
        <!-- 非ログイン時の表示 -->
        <span><a href="/login">ログイン</a></span>
    @endif
        <a href="/"><button class="button" type="submit">ユーザー画面へ</button></a>
</div>
@endsection