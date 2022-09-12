
<?php $__env->startSection('content'); ?>
    <div class="change-pass">
        <div class="container">
            <form action="/change_pass_doc" method="post">
                <?php echo csrf_field(); ?>
                <div class="row justify-content-md-center">
                    <div class="col-md-6">
                        <?php if(Session::has('success')): ?>
                            <div class="alert alert-success"><span class="closebtn">×</span><?php echo e(Session::get('success')); ?></div>
                        <?php endif; ?>
                        <?php if(Session::has('fail')): ?>
                            <div class="alert alert-danger"><span class="closebtn">×</span><?php echo e(Session::get('fail')); ?></div>
                        <?php endif; ?>
                        <input name="old_pass" class=" form-control form-control-lg inp-form" type="password"
                            placeholder="Enter Old Password" aria-label=".form-control-lg example">
                        <?php $__errorArgs = ['old_pass'];
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
                        <?php if(Session::has('not_same')): ?>
                            <div class="alert alert-danger"><?php echo e(Session::get('not_same')); ?></div>
                        <?php endif; ?>
                        <input name="new_pass" class=" form-control form-control-lg inp-form" type="password"
                            placeholder="Enter New Password" aria-label=".form-control-lg example">
                        <?php $__errorArgs = ['new_pass'];
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
                        <input name="password_confirmation" class=" form-control form-control-lg inp-form" type="password"
                            placeholder="Password Confirmation" aria-label=".form-control-lg example">
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
                        <input type="submit" class="reset-pass btn-front card-btn btn btn-primary mb-3 py-2" name="submit" value="Reset Password">
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\3rd_p\HIS_Project_Kovido\resources\views/change_pass_doc.blade.php ENDPATH**/ ?>