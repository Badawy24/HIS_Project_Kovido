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
</head>

<body>
    <main class="dark-light-content forget-main">
        <div class="foget-password ">
            <div class="container fog-padding">
                <div class="forget-mail rest-pass col-sm-12 col-md-6">
                    <div class="image">
                        <?php echo $__env->yieldContent('image'); ?>

                    </div>
                    <div class="head">
                        <?php echo $__env->yieldContent('head'); ?>

                    </div>
                    <?php echo $__env->yieldContent('form'); ?>
                </div>
            </div>
        </div>
    </main>
    <a href="#" id="ToggleDarkLight" class="icon-d fa-beat-fade"><i id="icon-dl"
            class="fa-2x fa-solid fa-moon fa-beat-fade icon-dark"></i></a>
    <script src="/js/toggleDarkLight.js"></script>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/file.js"></script>
    <script src="/js/all.min.js"></script>
</body>

</html>
<?php /**PATH C:\Users\DELL\OneDrive\Desktop\3rd_Project\HIS_Project_Kovido\resources\views/forget-temp.blade.php ENDPATH**/ ?>