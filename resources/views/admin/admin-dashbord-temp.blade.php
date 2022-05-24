<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style-admin.css">
    <link rel="stylesheet" href="/css/all.min.css">
</head>

<body>
    @include('navbar')
    <div class="alert-admin">
        <div class="container p-3">
            <div class="alert alert-primary" role="alert">
                Hello From Admin Page , You Can Get Reports About Data You Want Here.
            </div>
        </div>
    </div>
    <div>@yield('content')</div>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/file.js"></script>
    <script src="/js/all.min.css"></script>
</body>

</html>
