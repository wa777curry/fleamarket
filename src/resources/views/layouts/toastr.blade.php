<!-- フラッシュメッセージの設定-->
<style>
    /* 表示位置 */
    .toast-top-right {
        top: 65px;
    }

    /* ここに@mediaの携帯表示の設定してもいいかも */
</style>

@if(session('flash_msg'))
<script>
    /* 表示内容設定 */
    toastr.options = {
        "closeButton": true,
        "timeOut": "1500",
    }

    /* 表示内容（OK・NG設定はtoast.jsに記述） */
    var flashMsg = '{{ session("flash_msg") }}';
    var flashTtl = '{{ session("flash_ttl") }}';
</script>

<script src="{{ asset('js/toast.js') }}"></script>
@endif