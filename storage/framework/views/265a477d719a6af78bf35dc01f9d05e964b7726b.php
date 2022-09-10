<?php $__env->startSection('content'); ?>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="register-form">
                        <!-- ////////////// -->
                        <h2 class="head-cards h1 py-5 text-center">Welcome <span class="user-name">
                                <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($patient->pat_fname); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </span> Can Edit Profile
                        </h2>
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
                                <i class="fa-regular fa-circle-check"></i>
                                &nbsp;
                                <div>
                                    <?php echo e(Session::get('success')); ?>

                                </div>
                            </div>
                        <?php endif; ?>
                        <form action="/updateprofile" method="POST" class="row">
                            <?php echo csrf_field(); ?>
                            <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6">
                                    <label for="f_name" class="form-label profile_label_style">FirstName</label>
                                    <input class=" form-control input_profile" disabled type="text"
                                        value="<?php echo e($patient->pat_fname); ?>" name="pat_fname" id="f_name"
                                        aria-label="default
                                                input example">

                                </div>
                                <div class="col-md-6">
                                    <label for="l_name"
                                        class="form-label
                                            profile_label_style">Last
                                        Name</label>
                                    <input
                                        class="form-control col-auto
                                            input_profile"
                                        type="text" disabled value="<?php echo e($patient->pat_lname); ?>" name="pat_lname"
                                        id="l_name" aria-label="default input example">
                                </div>
                                <div class="col-lg-12">
                                    <label for="ssn"
                                        class="form-label
                                            profile_label_style">SSN</label>

                                    <input class=" form-control
                                            input_profile"
                                        type="text" value="<?php echo e($patient->pat_SSN); ?>" name="pat_SSN" id="ssn"
                                        disabled aria-label="default input example">
                                </div>
                                <div class="col-lg-12">
                                    <label for="email"
                                        class="form-label
                                            profile_label_style">Email</label>
                                    <input class=" form-control edit_label" type="email" value="<?php echo e($patient->pat_email); ?>"
                                        name="pat_email" id="email" aria-label="default input example">
                                    <?php $__errorArgs = ['pat_email'];
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
                                </div>

                                <div class="col-lg-12">
                                    <label for="address"
                                        class="form-label
                                            profile_label_style">Address</label>
                                    <input class=" form-control" type="text" value="<?php echo e($patient->pat_address); ?>"
                                        name="pat_address" id="address"
                                        aria-label="default
                                            input example">
                                    <?php $__errorArgs = ['pat_address'];
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
                                </div>
                                <div class="col-lg-12">
                                    <label for="phone"
                                        class="form-label
                                            profile_label_style">Phone</label>
                                    <input class=" form-control" type="tel" value="<?php echo e($patient->pat_phone); ?>"
                                        name="pat_phone" id="phone"
                                        aria-label="default input
                                            example">
                                    <?php $__errorArgs = ['pat_phone'];
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
                                </div>
                                <?php
                                $dateBrith = date_create(date('Y-m-d'));
                                date_sub($dateBrith, date_interval_create_from_date_string('15 years'));
                                ?>
                                <div class="col-lg-8">
                                    <label for="birthday"
                                        class="form-label
                                profile_label_style">Birthday</label>
                                    <input class=" form-control" type="date" value="<?php echo e($patient->pat_DOF); ?>"
                                        name="birthday" id="birthday"
                                        aria-label="default input
                                example"
                                        max="<?php echo date_format($dateBrith, 'Y-m-d'); ?>">
                                    <?php $__errorArgs = ['birthday'];
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
                                </div>
                                <div class="col-lg-4">
                                    <label for="age"
                                        class="form-label
                                            profile_label_style">Age</label>
                                    <input disabled class=" form-control input_profile" type="text"
                                        value="<?php echo e($patient->pat_age); ?>" name="age" id="age"
                                        aria-label="default input
                                            example">
                                </div>
                                <input type="submit"
                                    class="btn btn-primary
                                        mb-3 submit"
                                    value="Save" name="register-user">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </form>
                    </div>
                </div>
                <div class="col-md-6 center-image">
                    <div class="login-img ">
                        <img id="editprof" src="/images/editprof.png" class="img-fluid" width="200px"
                            height="200px" />
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Badawy\Desktop\HIS_Project_Kovido\resources\views/Editprofile.blade.php ENDPATH**/ ?>