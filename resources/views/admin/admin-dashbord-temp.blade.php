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
    <link rel="stylesheet" href="/css/patient_data_show.css">
    <link href='https://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>
</head>

<body>
    @include('navbar')
    <div class="row">
        <div class="col-md-3">
            @include('admin.admin_option')
        </div>
        <div class="col-md-9">
            <div class="admin-page">
                <div class="alert-admin">
                    <div class="container p-3">
                        <div class="alert alert-primary alert-p" role="alert">
                            Hello From Admin Page , You Can Get Reports About Data You Want Here.
                        </div>
                    </div>
                </div>
                <div>@yield('content')</div>
            </div>
        </div>
    </div>

    <script src="/js/dark_light_admin.js"></script>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/file.js"></script>
    <script src="/js/all.min.css"></script>
</body>

</html>
