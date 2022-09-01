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
    <?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-3">
            <?php echo $__env->make('admin.admin_option', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                <div><?php echo $__env->yieldContent('content'); ?></div>
            </div>
        </div>
    </div>

    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/file.js"></script>
    <script src="/js/all.min.css"></script>
</body>

</html>
<?php /**PATH C:\Users\DELL\OneDrive\Desktop\3rd_Project\HIS_Project_Kovido\resources\views/admin/admin-dashbord-temp.blade.php ENDPATH**/ ?>