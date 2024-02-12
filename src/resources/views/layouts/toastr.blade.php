<!-- フラッシュメッセージの設定-->
<style>
    /* 表示位置 */
    .toast-top-right {
        top: 65px;
    }

    /* ここに@mediaの携帯表示の設定してもいいかも */
</style>

<script>
    /* 表示内容設定 */
    toastr.options = {
        "closeButton": true,
        "timeOut": "1500",
    }

    @if (Session::has('flashSuccess'))
        toastr.success("{{ session('flashSuccess') }}");
    @endif

    @if (Session::has('flashError'))
        toastr.error("{{ session('flashError') }}");
    @endif

    @if (Session::has('flashInfo'))
        toastr.info("{{ session('flashInfo') }}");
    @endif

    @if (Session::has('flashWarning'))
        toastr.warning("{{ session('flashWarning') }}");
    @endif
</script>