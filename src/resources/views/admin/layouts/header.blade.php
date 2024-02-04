@section('header')
<img src="/storage/image/logo.svg">
<div>
    @if (Auth::check())
        <!-- ログイン時の表示 -->
        <span><a href="{{ url('admin/logout') }}">ログアウト</a></span>
    @else
        <!-- 非ログイン時の表示 -->
        <span><a href="/login">ログイン</a></span>
    @endif
        <a href=""><button class="button" type="submit">　</button></a>
</div>
@endsection