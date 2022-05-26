<!-- Badawy -->


<?php $__env->startSection('content'); ?>
    <div class="contact_us main-div-login">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="contact-img">
                        <img src="\images\contact\Online Doctor.png" class="img-fluid" />
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="contact-form register-form ">
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
                        <div class="head-contact-doctor">
                            <h4>You Can Contact With Doctor Now!</h4>
                        </div>
                        <form action="<?php echo e(route('sendDoc.email')); ?>" method="POST" class="row">
                            <?php echo csrf_field(); ?>
                            <div class="col-lg-12">
                                <select class="form-select" name="doc_name" id="doc_name"
                                    aria-label="Default select example">
                                    <?php $__currentLoopData = $doc_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($doc_name->doc_email); ?>"><?php echo e($doc_name->doc_fname); ?>

                                            <?php echo e($doc_name->doc_lname); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['doc_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-lg-12">
                                <input class=" form-control" type="text" placeholder="Message Subject" name="subj"
                                    id="subj" aria-label="default input example">
                                <?php $__errorArgs = ['subj'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-lg-12">
                                <textarea class=" form-control" placeholder="Enter Your Message" name="msg" id="msg" aria-label="default input example"
                                    style="height: 120px"></textarea>
                                <?php $__errorArgs = ['msg'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <button class="btn btn-primary mb-3 submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Badawy\Desktop\New folder\HIS_Project_Kovido\resources\views/contact_doc.blade.php ENDPATH**/ ?>