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
    <main class="dark-light-content">
        <?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <a href="#" id="ToggleDarkLight" class="icon-d fa-beat-fade"><i id="icon-dl"
            class="fa-2x fa-solid fa-moon fa-beat-fade icon-dark"></i></a>
    <script src="/js/toggleDarkLight.js"></script>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/file.js"></script>
    <script src="/js/all.min.js"></script>

</body>

</html><?php /**PATH A:\third_year_training\HIS_Project_Kovido-main\HIS_Project_Kovido-main\resources\views/main-template.blade.php ENDPATH**/ ?>