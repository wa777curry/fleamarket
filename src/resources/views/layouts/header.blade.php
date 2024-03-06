@section('header')
<div>
    <a href="/"><img src="/storage/image/logo.svg"></a>
</div>
<div>
    <form action="{{ route('search') }}" method="get">
        @csrf
        <input type="search" name="search" placeholder="なにをお探しですか？">
    </form>
</div>
<div>
    @if (Auth::check())
    <!-- ログイン時の表示 -->
    <span><a href="{{ url('logout') }}">ログアウト</a></span>
    <span><a href="/mypage">マイページ</a></span>
    @else
    <!-- 非ログイン時の表示 -->
    <span><a href="/login">ログイン</a></span>
    <span><a href="/register">会員登録</a></span>
    @endif
    <a href="/sell"><button class="button" type="submit">出品</button></a>
</div>
@endsection