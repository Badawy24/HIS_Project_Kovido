
<?php $__env->startSection('content'); ?>
    <div class="main-div-login">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="test-form">
                        <form action="new_test" method="post" class="row">
                            <?php echo csrf_field(); ?>
                            <?php if(Session::has('success')): ?>
                                <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                            <?php endif; ?>
                            <?php if(Session::has('fail')): ?>
                                <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
                            <?php endif; ?>
                            <div class="col-md-12">

                                <label>Choose test</label>
                                <select class=" form-select " aria-label="Default select example" name="test_name"
                                    value="<?php echo e(old('test')); ?>">
                                    <!-- <option selected disabled> Choose test </option> -->
                                    <?php $__currentLoopData = $tests_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($test->test_name); ?>"><?php echo e($test->test_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- <option value="RT-PCR">RT-PCR</option>
                                    <option value="Antigen">Antigen</option>
                                    <option value="X-ray">X-ray</option>
                                    <option value="CBC">CBC</option> -->
                                </select>
                                <?php $__errorArgs = ['test'];
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

                            <div class="col-md-12">
                                <label>Choose Health Care Center</label>
                                <select class="form-select" aria-label="Default select example" name="health_cc"
                                    value="<?php echo e(old('health_cc')); ?>">
                                    <?php $__currentLoopData = $hc_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($hc->hc_name); ?>"><?php echo e($hc->hc_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- <option selected disabled> Choose Health Care Center </option> -->
                                    <!-- <option value="benha">benha</option>
                                    <option value="tanta">tanta</option>
                                    <option value="giza">giza</option>
                                    <option value="cairo hcc">cairo hcc</option> -->
                                </select>
                                <?php $__errorArgs = ['health_cc'];
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
                                <label>Date</label>
                                <input class=" form-control" type="date" placeholder="test_date" name="test_date"
                                    id="test_date" aria-label="default input example" value="<?php echo e(old('test_date')); ?>">
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


                            <div class="col-lg-12">
                                <label>Time</label>
                                <input class="form-control" type="time" name="test_time" placeholder="test_time"
                                    id="test_time" aria-label="default input example" value="<?php echo e(old('test_time')); ?>">
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


                            <input type="reset" class="btn btn-primary mb-3 submit" value="reset">
                            <input type="submit" class="btn btn-primary mb-3 submit" value="confirm">

                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="login-img">
                        <img src="/images/test_reservation.png" class="test_form_img" />
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Laravel-project\final-web\HIS_Project_Kovido\resources\views/new_test.blade.php ENDPATH**/ ?>