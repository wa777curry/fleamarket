@section('header')
<div>
    <img src="/storage/image/logo.svg">
</div>
<div>
    @if (Auth::check())
    <!-- ログイン時の表示 -->
    <span><a href="{{ url('admin/logout') }}">ログアウト</a></span>
    @else
    <!-- 非ログイン時の表示 -->
    <span><a href="{{ url('admin/login') }}">ログイン</a></span>
    @endif
</div>
@endsection