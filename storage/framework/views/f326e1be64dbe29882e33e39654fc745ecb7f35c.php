
<?php $__env->startSection('content'); ?>
    <h2 style="text-align: center;">Here, you can add a petient</h2>
    <form action="admin_add_patient" method="post" class="row" id="admin_patient">
        <?php if(session('a_i_msg')): ?>
            <div class="alert alert-success">Patient added successfully</div>
        <?php elseif(session('a_r_msg')): ?>
            <div class="alert alert-danger">The operation is unsuccessful</div>
        <?php endif; ?>

        <?php echo csrf_field(); ?>
        <div class="col-md-6">
            <input class=" form-control" type="text" placeholder="First Name" name="pat_fname"
                value="<?php echo e(old('pat_fname')); ?>" id="name" aria-label="default input example">

            <?php $__errorArgs = ['pat_fname'];
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
            <input class="form-control col-auto" type="text" placeholder="Last Name" name="pat_lname"
                value="<?php echo e(old('pat_lname')); ?>" id="name" aria-label="default input example">

            <?php $__errorArgs = ['pat_lname'];
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
        <div class="col-lg-12">
            <input class=" form-control" type="text" placeholder="SSN" name="pat_SSN" id="ssn"
                aria-label="default input example">

            <?php $__errorArgs = ['pat_SSN'];
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
        <div class="col-lg-12">
            <input class=" form-control" type="email" placeholder="Patient Email" name="pat_email"
                value="<?php echo e(old('pat_email')); ?>" id="email" aria-label="default input example">

            <?php $__errorArgs = ['pat_email'];
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
        <div class="col-lg-12">
            <input class=" form-control" type="password" placeholder="Password" name="p_pass" id="password"
                aria-label="default input example">

            <?php $__errorArgs = ['pat_password'];
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
        <div class="col-lg-12">
            <input class=" form-control" type="password" placeholder="Confirm Password" name="password_confirmation"
                id="password" aria-label="default input example">

            <?php $__errorArgs = ['password_confirmed'];
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
        <div class="col-lg-12">
            <input class=" form-control" type="text" placeholder="Address" name="pat_address"
                value="<?php echo e(old('pat_address')); ?>" id="address" aria-label="default input example">

            <?php $__errorArgs = ['pat_address'];
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
        <div class="col-lg-12">
            <input class=" form-control" type="tel" placeholder="Phone Number" name="pat_phone"
                value="<?php echo e(old('pat_phone')); ?>" id="phone" aria-label="default input example">

            <?php $__errorArgs = ['pat_phone'];
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
        
        <?php
        $dateBrith = date_create(date('Y-m-d'));
        date_sub($dateBrith, date_interval_create_from_date_string('15 years'));
        ?>
        <div class="col-lg-12">
            <label class="head-fog">Birth Of Date</label>
            <input class=" form-control" type="date" placeholder="Birth Of Date" name="pat_DOF" id="BOD"
                value="<?php echo e(old('pat_DOF')); ?>" aria-label="default input example" max="<?php echo date_format($dateBrith, 'Y-m-d'); ?>">

            <?php $__errorArgs = ['pat_DOF'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger d-flex
                align-items-center" role="alert">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <div> <?php echo e($message); ?> </div>
                </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        </div>
        <input type="submit" class="btn update-btn btn-primary mb-3 submit " style="margin-left:360px" value="Register" name="register-user">
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\T95_github\sum_tra_pro\HIS_Project_Kovido\resources\views/admin/admin_add_patient.blade.php ENDPATH**/ ?>