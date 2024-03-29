
<?php $__env->startSection('content'); ?>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="register-form">
                        <!-- ////////////// -->
                        <h2 class="head-cards h1 py-5 text-center">Welcome <span class="user-name">
                            <?php echo e($doctor[0]->doc_fname); ?>

                            </span> Can Edit Profile
                        </h2>
                        <?php if(Session::has('error')): ?>
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <div>
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    &nbsp;
                                    <?php echo e(Session::get('error')); ?> 
                                </div>
                                <span class="closebtn">×</span>
                            </div>
                            
                        <?php endif; ?>
                        <?php if(Session::has('success')): ?>
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <i class="fa-regular fa-circle-check"></i>
                                &nbsp;
                                <div>
                                    <?php echo e(Session::get('success')); ?> 
                                </div>
                                <span class="closebtn">×</span>
                            </div>
                        <?php endif; ?>
                        <form action="/edit_profile_doc" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="f_name" class="form-label profile_label_style">FirstName</label>
                                    <input class=" form-control input_profile" disabled type="text"
                                        value="<?php echo e($doctor[0]->doc_fname); ?>" name="doc_fname" id="f_name"
                                        aria-label="default input example">

                                </div>
                                <div class="col-md-6">
                                    <label for="l_name"
                                        class="form-label
                                            profile_label_style">Last
                                        Name</label>
                                    <input
                                        class="form-control col-auto
                                            input_profile"
                                        type="text" disabled value="<?php echo e($doctor[0]->doc_lname); ?>" name="doc_lname"
                                        id="l_name" aria-label="default input example">
                                </div>
                                
                                <div class="col-lg-12">
                                    <label for="email"
                                        class="form-label
                                            profile_label_style">Email</label>
                                    <input class=" form-control edit_label" type="email" value="<?php echo e($doctor[0]->doc_email); ?>"
                                        name="doc_email" id="email" aria-label="default input example">
                                    <?php $__errorArgs = ['doc_email'];
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
                                    <input class=" form-control" type="tel" value='<?php echo e($doctor[0]->doc_phone); ?>'
                                        name="doc_phone" id="phone"
                                        aria-label="default input
                                            example">
                                    <?php $__errorArgs = ['doc_phone'];
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
                                        value="<?php echo e($doctor[0]->doc_age); ?>" name="age" id="age"
                                        aria-label="default input
                                            example">
                                </div>
                            </div>
                                <input type="submit"
                                    class="btn btn-primary
                                        mb-3 submit"
                                    value="Save" name="register-user">

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

<?php echo $__env->make('main-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Badawy\Desktop\v0.2\HIS_Project_Kovido\resources\views/edit_profile_doc.blade.php ENDPATH**/ ?>