<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css" id="cssToggle">
    <link rel="stylesheet" href="/css/all.min.css">
    @yield('links')
</head>

<body>
    <main class="dark-light-content">
        @include('navbar')
        @yield('content')
    </main>
    <a href="#" id="ToggleDarkLight" class="icon-d fa-shake"><i id="icon-dl"
            class="fa-solid fa-moon fa-shake icon-dark"></i></a>
    <script src="/js/toggleDarkLight.js"></script>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/file.js"></script>
    <script src="/js/all.min.js"></script>
    @yield('scripts')
</body>

</html>
