
<?php $__env->startSection('content'); ?>
    <div class="form-add-doc">
        <div class="container">
            <div class="doc-data ">
                <p class="head">Update Reservation of Patient:
                    <span><?php echo e($dose_data->pat_fname . ' ' . $dose_data->pat_lname); ?></span>
                    <br />
                    Date : <?php $date = date('d-m-y h:i:s');
                    echo $date; ?>
                </p>
                <hr>
            </div>
            <form action="/admin_update_dose" method="post">
                <?php echo csrf_field(); ?>
                <?php if(Session::has('success')): ?>
                    <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                <?php endif; ?>

                <?php if(Session::has('fail')): ?>
                    <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
                <?php endif; ?>
                <div class="row">
                    
                    <input type="hidden" value="<?php echo e($dose_data->pat_id); ?>" name="pat_id">
                    <div class="col-md-6 update-inp">
                    <label for="patient_name">Patient_Name </label>
                        <input class="form-control" name="patient_name" type="text" aria-label="default input example"
                            value="<?php echo e($dose_data->pat_fname . ' ' . $dose_data->pat_lname); ?>" disabled>
                        <?php $__errorArgs = ['patient_name'];
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
                    <label for="dose_name">Dose_Name </label>
                        <select class="form-select" aria-label="Default select example" name="dose_name">
                            <option selected hidden value="<?php echo e($dose_data->dose_id); ?>"><?php echo e($dose_data->vaccine_name); ?>

                            </option>
                            <?php $__currentLoopData = $doses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dose): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($dose->dose_id); ?>"><?php echo e($dose->vaccine_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['dose_name'];
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
                    <label for="first_dose">First Dose Date </label>
                        <input class="form-control" name="first_dose" type="date" placeholder="first_dose"
                            aria-label="default input example" value="<?php echo e($dose_data->pat_dose_date); ?>">
                        <?php $__errorArgs = ['first_dose'];
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
                    <label for="time_dose">Dose Time</label>
                        <input class="form-control" name="time_dose" type="time" placeholder="time_dose"
                            aria-label="default input example" value="<?php echo e($dose_data->pat_dose_time); ?>">
                        <?php $__errorArgs = ['time_dose'];
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
                    <label for="second_dose">Second Dose Date </label>
                        <input class="form-control" name="second_dose" type="date" placeholder="second_dose"
                            aria-label="default input example"
                            value="<?php echo e(date('Y-m-d', strtotime($dose_data->pat_dose_date . '+ 14 days'))); ?>" disabled>
                        <?php $__errorArgs = ['second_dose'];
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
                    <label for="hc_name">Health Care Center </label>
                        <select class="form-select" aria-label="Default select example" name="hc_name">
                            <option selected hidden value="<?php echo e($dose_data->hc_id); ?>"><?php echo e($dose_data->hc_name); ?></option>
                            <?php $__currentLoopData = $hecs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($hec->hc_id); ?>"><?php echo e($hec->hc_name); ?> [
                                    <?php echo e($hec->hc_address); ?> ]
                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['hc_name'];
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
                        <input type="submit" class="update-btn " name="submit" value="Update Reservation">
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\T95_github\sum_tra_pro\HIS_Project_Kovido\resources\views/admin/admin_update_dose_res.blade.php ENDPATH**/ ?>