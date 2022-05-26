<?php $__env->startSection('content'); ?>
    <div class="main-div-login">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="register-form">
                        <!-- ////////////// -->
                        <form action="register" method="POST" class="row">
                            <?php if(Session::has('success')): ?>
                                <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                            <?php endif; ?>

                            <?php if(Session::has('fail')): ?>
                                <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
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
                                <input class=" form-control" type="password" placeholder="Password" name="p_pass"
                                    id="password" aria-label="default input example">

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
                                <input class=" form-control" type="password" placeholder="Confirm Password"
                                    name="password_confirmation" id="password" aria-label="default input example">

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
                            <div class="col-md-12">
                                <input class="form-control" type="number" placeholder="Age" name="pat_age"
                                    value="<?php echo e(old('pat_age')); ?>" id="age" aria-label="default input example">

                                <?php $__errorArgs = ['pat_age'];
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
                                <label>Birth Of Date</label>
                                <input class=" form-control" type="date" placeholder="Birth Of Date" name="pat_DOB"
                                    id="BOD" value="<?php echo e(old('pat_BOF')); ?>" aria-label="default input example">

                                <?php $__errorArgs = ['pat_BOF'];
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
                            <a class="link" href="/login">allready have an account ?</a>
                            <input type="submit" class="btn btn-primary mb-3 submit" value="Register" name="register-user">
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="login-img">
                        <img src="/images/register-img.png" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Badawy\Desktop\HIS_Project_Kovido\resources\views/register.blade.php ENDPATH**/ ?>