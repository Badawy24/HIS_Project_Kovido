

<?php $__env->startSection('image'); ?>
<img src="/images/Forgot password-bro.png" class="img-fluid" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>
<h3>Forgot Password?</h3>
<p class="lead">Enter Your Email Address Associated With Your Account.</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form'); ?>
<?php if(Session::has('error')): ?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <div>
            <?php echo e(Session::get('error')); ?>

        </div>
    </div>
<?php endif; ?>
<?php if(Session::has('success')): ?>
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
            <use xlink:href="#check-circle-fill" />
        </svg>
        <div>
            <?php echo e(Session::get('success')); ?>

        </div>
    </div>
<?php endif; ?>
<form action='sendmailForget' method='post'>
    <?php echo csrf_field(); ?>
    <input value = "<?php echo e(old('email')); ?>" name="email" class="email form-control form-control-lg" type="text" placeholder="Enter Email" aria-label=".form-control-lg example">
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
    <button type="submit" class="btn btn-primary mb-3 send">Send <i class="fa-solid fa-arrow-right-long"></i></button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('forget-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\new clone\HIS_Project_Kovido\resources\views/forget-send-mail.blade.php ENDPATH**/ ?>