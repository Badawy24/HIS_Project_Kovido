
<?php $__env->startSection('content'); ?>
<!-- ////////////// -->
    <div class="form-add-doc">
        <div class="container">
            <div class="doc-data ">

                <p class="head">Update Reservation of Patient:
                    <span><?php echo e($resv_tests->pat_fname . ' ' . $resv_tests->pat_lname); ?></span>
                    <br />
                    Date : <?php $date = date('d-m-y h:i:s');
                    echo $date; ?>
                </p>
                <hr>

            </div>

            <form action="/update_testres_data" method="post">
                <?php echo csrf_field(); ?>

                <?php if(Session::has('success')): ?>
                    <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                <?php endif; ?>

                <?php if(Session::has('fail')): ?>
                    <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
                <?php endif; ?>



                <div class="row">

                    <input type="hidden" value="<?php echo e($resv_tests->res_id); ?>" name="res_id">

                    <div class="col-md-6 update-inp">
                    <label for="patient_name">Patient Name </label>
                        <input class="form-control" name="patient_name" type="text" aria-label="default input example"
                            value="<?php echo e($resv_tests->pat_fname . ' ' . $resv_tests->pat_lname); ?>" disabled>
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
                    <label for="test name">Test Name </label>
                        <select class="form-select" aria-label="Default select example" name="test_name">
                            <option selected hidden value="<?php echo e($resv_tests->test_id); ?>"><?php echo e($resv_tests->test_name); ?>

                            </option>
                            <?php $__currentLoopData = $alltes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($testes->test_id); ?>"><?php echo e($testes->test_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php $__errorArgs = ['test_name'];
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
                    <label for="test_date">Test Date </label>
                        <input class="form-control" name="test_date" type="date" placeholder="test_date"
                            aria-label="default input example" value="<?php echo e($resv_tests->pat_test_date); ?>">

                        <?php $__errorArgs = ['test_date'];
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
                    <label for="test_time">Test Time </label>
                        <input class="form-control" name="test_time" type="time" placeholder="test_time"
                            aria-label="default input example" value="<?php echo e($resv_tests->pat_test_time); ?>">

                        <?php $__errorArgs = ['test_time'];
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

                            <option selected hidden value="<?php echo e($resv_tests->hc_id); ?>"><?php echo e($resv_tests->hc_name); ?></option>
                            <?php $__currentLoopData = $hecs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($hc->hc_id); ?>"><?php echo e($hc->hc_name); ?> [
                                    <?php echo e($hc->hc_address); ?> ]
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

<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\T95_github\sum_tra_pro\HIS_Project_Kovido\resources\views/admin/admin_update_test_res.blade.php ENDPATH**/ ?>