@section('header')
<div>
    <a href="/admin"><img src="/img/image/logo.svg"></a>
</div>
<div>
    <span><a href="http://localhost:8025/" target="_blank">MailHog</a></span>
    <span><a href=" {{ url('admin/logout') }}">ログアウト</a></span>
</div>
@endsection