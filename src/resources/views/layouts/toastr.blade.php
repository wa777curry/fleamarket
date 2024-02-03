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
        @if(session('login_ttl') === '成功')
            toastr.success('{{ session("login_msg") }}', '{{ session("login_ttl") }}');
        @else
            toastr.error('{{ session("login_msg") }}', '{{ session("login_ttl") }}');
        @endif
    });
</script>
@endif