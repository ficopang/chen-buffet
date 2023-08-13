<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>@yield('title')</title>
    <style>
        * {
            color:white;
            font-family: 'Outfit', sans-serif;
        }

        .pagination > li > a,
        .pagination > li > span {
            color: rgb(var(--bs-dark-rgb)) !important;
            border-color: white !important;
        }

        .pagination > .active > a,
        .pagination > .active > a:focus,
        .pagination > .active > a:hover,
        .pagination > .active > span,
        .pagination > .active > span:focus,
        .pagination > .active > span:hover {
            color: white !important;
            background-color: rgba(var(--bs-secondary-rgb), var(--bs-bg-opacity)) !important;
        }

        body {
            display: grid;
            min-height: 100vh;
            grid-template-rows: auto 1fr auto;
        }
    </style>
</head>
<body class="bg-dark">
    @component('components.navbar')
    @endcomponent
    @yield('content')
    @component('components.footer')
    @endcomponent
</body>
</html>
