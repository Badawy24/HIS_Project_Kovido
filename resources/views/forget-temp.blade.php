<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/all.min.css">
</head>

<body>
    <div class="foget-password">
        <div class="container">
            <div class="forget-mail">
                <div class="image">
                    @yield('image')
                    
                </div>
                <div class="head">
                    @yield('head')
                    
                </div>
                @yield('form')
            </div>
        </div>
    </div>

    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/file.js"></script>
    <script src="/js/all.min.css"></script>
</body>

</html>