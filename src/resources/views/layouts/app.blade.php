<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coachtechフリマ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <!-- toastr.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    @yield('css')
</head>

<body>
    <header>
        @yield('header')
        @yield('header2')
        @yield('header3')
    </header>
    <main>
        @yield('main')
    </main>

    <!-- toast.js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @include('layouts.toastr')
    <!-- 他js -->
    <script src="{{ asset('js/icon.js') }}"></script>
    <script src="{{ asset('js/panel.js') }}"></script>
</body>

</html>