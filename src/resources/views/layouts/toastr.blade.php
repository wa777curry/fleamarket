<!-- フラッシュメッセージの設定-->
<style>
    /* 表示位置 */
    .toast-top-right {
        top: 65px;
    }
    /* ここに@mediaの携帯表示の設定してもいいかも */
</style>

@if(session('login_msg'))
<script>
    /* 表示内容設定 */
    toastr.options = {
        "closeButton": true,
        "timeOut": "1500",
    }

    /* 表示内容（OK・NG設定はtoast.jsに記述） */
    var loginMsg = '{{ session("login_msg") }}';
    var loginTtl = '{{ session("login_ttl") }}';
</script>

<script src="{{ asset('js/toast.js') }}"></script>
@endif