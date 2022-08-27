
<?php $__env->startSection('content'); ?>
    <div class="main-div-login">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="login-img">
                        <img id="login-img" src="/images/login-img-2.png" class="img-fluid" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="login-form">
                        <form action="login" method="post">
                            <?php if(Session::has('cantLogin')): ?>
                                <div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    <div><?php echo e(Session::get('cantLogin')); ?> </div>
                                </div>
                            <?php endif; ?>
                            <?php echo csrf_field(); ?>
                            <input class="form-control" type="text" placeholder="Username or Email" name="email"
                                id="email" aria-label="default input example" value="<?php echo e(old('email')); ?>">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    <div><?php echo e($message); ?> </div>
                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <input class="form-control" type="password" placeholder="Password" name="password"
                                id="password" aria-label="default input example">
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    <div> <?php echo e($message); ?> </div>
                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <a class="link" href="/forgetSendMail">Do You Forget Password?</a>
                            <a class="link" href="/register">Don't Have Account..</a>
                            <input type="submit" class="btn btn-primary mb-3 submit btn-front" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\3rd training\HIS_Project_Kovido\resources\views/login.blade.php ENDPATH**/ ?>