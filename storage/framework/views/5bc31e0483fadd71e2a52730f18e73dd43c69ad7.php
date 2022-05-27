

<?php $__env->startSection('image'); ?>
    <img src="/images/Reset password.gif" class="img-fluid" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>
    <h3>Reset Password</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form'); ?>
    <form action='/resetPass' method='post'>
        <?php if(Session::has('error')): ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <div>
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    &nbsp;
                    <?php echo e(Session::get('error')); ?>

                </div>
            </div>
        <?php endif; ?>
        <?php if(Session::has('success')): ?>
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <div>
                    <i class="fa-regular fa-circle-check"></i>
                    &nbsp;
                    <?php echo e(Session::get('success')); ?>

                    <a href='login'>Login</a>
                </div>
            </div>
        <?php endif; ?>
        <?php echo csrf_field(); ?>
        <input class="email form-control form-control-lg" name="email" type="email" placeholder="Enter Email"
            aria-label=".form-control-lg example">
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
        <input class="pass form-control form-control-lg" name="password" type="password" placeholder="password"
            aria-label=".form-control-lg example">
        <?php $__errorArgs = ['password'];
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
        <input class="pass form-control form-control-lg" name="password_confirmation" type="password"
            placeholder="confirm Password" aria-label=".form-control-lg example">
        <?php $__errorArgs = ['password_confirmation'];
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
        <button type="submit" class="btn btn-primary mb-3 send">Change Password</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('forget-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Badawy\Desktop\HIS_Project_Kovido\resources\views/forget-reset-pass.blade.php ENDPATH**/ ?>