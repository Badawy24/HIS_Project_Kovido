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
                    <img src="/images/Forgot password-bro.png" class="img-fluid" />
                </div>
                <div class="head">
                    <h3>Forgot Password?</h3>
                    <p class="lead">Enter Your Email Address Associated With Your Account.</p>
                </div>
                <?php echo csrf_field(); ?>
                <form action='/forgetPass' method='get'>
                    <input class="email form-control form-control-lg" type="email" placeholder="Enter Email" aria-label=".form-control-lg example">
                    <button type="submit" class="btn btn-primary mb-3 send">Send <i class="fa-solid fa-arrow-right-long"></i></button>
                </form>
            </div>
        </div>
    </div>

    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/file.js"></script>
    <script src="/js/all.min.css"></script>
</body>

</html><?php /**PATH C:\Users\DELL\OneDrive\Desktop\new clone\HIS_Project_Kovido\resources\views/forget-pass.blade.php ENDPATH**/ ?>