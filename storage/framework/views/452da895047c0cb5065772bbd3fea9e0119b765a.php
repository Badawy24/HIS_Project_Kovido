
<?php $__env->startSection('content'); ?>
    <div class="main-div-login">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="login-img">
                        <img src="/images/login-img-2.png" class="img-fluid" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="login-form">
                        <form action="profile" method="post">
                            <input class="form-control" type="text" placeholder="Username or Email" name="username"
                                id="username" aria-label="default input example">
                            <input class="form-control" type="password" placeholder="Password" name="password"
                                id="password" aria-label="default input example">
                            <a class="link" href="#">Do You Forget Password?</a>
                            <a class="link" href="/register">Don't Have Account..</a>
                            <input type="submit" class="btn btn-primary mb-3 submit" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\HIS_Proj\resources\views/login.blade.php ENDPATH**/ ?>