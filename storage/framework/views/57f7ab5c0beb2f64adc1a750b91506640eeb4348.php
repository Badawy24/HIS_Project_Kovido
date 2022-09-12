<?php 
use Illuminate\Support\Facades\Crypt;
?>

<?php $__env->startSection('content'); ?>
<div class="form-doc-update">
    <div class="container">
        <div class="doc-data ">
            <p class="head">Update Data about Doctor:
                <span><?php echo e($doctor->doc_fname . ' ' . $doctor->doc_lname); ?></span>
                <br />
                Date : <?php $date = date('d-m-y h:i:s');
                echo $date; ?>
            </p>
            <hr>
        </div>
        <form action="/admin_doc_data/<?php echo e($doctor->doc_id); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php if(Session::has('success')): ?>
                <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
            <?php endif; ?>

            <?php if(Session::has('fail')): ?>
                <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-6 update-inp">
                    <label>Doctor Name </label>
                    <input class="form-control" name="doc_name" type="text" aria-label="default input example"
                        value="<?php echo e($doctor->doc_fname . ' ' . $doctor->doc_lname); ?>" disabled>
                    <?php $__errorArgs = ['doc_name'];
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
                </div>
                <div class="col-md-6 update-inp">
                    <label>Phone Number </label>
                    <input class="form-control" name="doc_phone" type="text" aria-label="default input example"
                        value="<?php echo e($doctor->doc_phone); ?>">
                    <?php $__errorArgs = ['doc_phone'];
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
                </div>
                <div class="col-md-6 update-inp">
                    <label>Email </label>
                    <input class="form-control" name="doc_email" type="text" aria-label="default input example"
                        value="<?php echo e($doctor->doc_email); ?>">
                    <?php $__errorArgs = ['doc_email'];
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
                </div>
                <div class="col-md-6 update-inp">
                    <label>password </label>
                    <input class="form-control" name="doc_pass" type="text" aria-label="default input example"
                        value="<?php echo e($doctor->doc_pass); ?>">
                    <?php $__errorArgs = ['doc_pass'];
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
                </div>
                <div class="col-md-6 update-inp">
                    <label>Age </label>
                    <input class="form-control" name="doc_age" type="text" aria-label="default input example" disabled
                        value="<?php echo e($doctor->doc_age); ?>">
                    <?php $__errorArgs = ['doc_age'];
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
                </div>
                <div class="col-md-6 update-inp">
                    <label>Gender </label>
                    <select class="form-select" aria-label="Default select example" name="doc_sex">
                        <option selected hidden value="<?php echo e($doctor->doc_sex); ?>"><?php echo e($doctor->doc_sex); ?>

                        </option>
                        <option value="male" disabled>Male</option>
                        <option value="female" disabled>Female</option>
                    </select>
                    <?php $__errorArgs = ['doc_sex'];
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
                </div>
                <div class="col-md-6">
                    <input type="submit" class="update-btn " name="submit" value="Update Doctor Data">
                </div>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\3rd_p\HIS_Project_Kovido\resources\views/admin/admin_doc_data_update.blade.php ENDPATH**/ ?>