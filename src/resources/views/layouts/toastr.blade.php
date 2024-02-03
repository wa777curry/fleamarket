<style>
    .toast-top-right {
        top: 65px;
    }

    /* ここに@mediaの携帯表示の設定してもいいかも */
</style>

@if(session('login_msg'))
<script>
    toastr.options = {
        "closeButton": true,
        "timeOut": "1500",
    }

    $(function() {
        toastr.success('{{ session("login_msg") }}');
    });
</script>
@endif