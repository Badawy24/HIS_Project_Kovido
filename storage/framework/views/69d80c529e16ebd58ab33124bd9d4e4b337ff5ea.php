<?php $__env->startSection('content'); ?>
    <div class="form-add-doc">
        <div class="container">
            <div class="doc-data ">
                <p class="head">Update Live Consultation of Patient:
                    <span><?php echo e($con_data->pat_fname . ' ' . $con_data->pat_lname); ?></span>
                    <br />
                    Date : <?php $date = date('d-m-y h:i:s');
                    echo $date; ?>
                </p>
                <hr>
            </div>
            <form action="/admin_con_update/<?php echo e($con_data->con_id); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php if(Session::has('success')): ?>
                    <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                <?php endif; ?>

                <?php if(Session::has('fail')): ?>
                    <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
                <?php endif; ?>
                <div class="row">

                    
                    <div class="col-md-6 update-inp">
                        <label for="patient_name">Patient Name </label>
                        <input class="form-control" name="patient_name" type="text" aria-label="default input example"
                            value="<?php echo e($con_data->pat_fname . ' ' . $con_data->pat_lname); ?>" disabled>
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
                    <div class="col-md-6">
                        <label for="doc_name">Doctor Name </label>
                        <select class="form-select" aria-label="Default select example" name="doc_name">
                            <option hidden value="<?php echo e($con_data->doc_id); ?>">
                                <?php echo e($con_data->doc_fname . ' ' . $con_data->doc_lname); ?></option>
                            <?php $docs = DB::select('select * from doctor'); ?>
                            <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($doc->doc_id); ?>">
                                    <?php echo e($doc->doc_fname . ' ' . $doc->doc_lname); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['doc_id'];
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
                        <label for="Title">Consultation Title</label>
                        <input class="form-control" name="Title" type="text" aria-label="default input example"
                            value="<?php echo e($con_data->con_title); ?>">
                        <?php $__errorArgs = ['Title'];
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
                        <label for="con_des">Consultation Date </label>
                        <input class="form-control" name="con_date" type="date" placeholder="con_des"
                            aria-label="default input example" value="<?php echo e($con_data->con_date); ?>" min="<?php echo date('Y-m-d'); ?>">
                        <?php $__errorArgs = ['con_des'];
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
                        <label for="con_time">Consultation Time</label>
                        <input class="form-control" name="con_time" type="time" placeholder="con_time"
                            aria-label="default input example" value="<?php echo e($con_data->con_time); ?>">
                        <?php $__errorArgs = ['con_time'];
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
                        <label for="con_meet_id">Consultation ID</label>
                        <input class="form-control" name="con_meet_id" type="text" placeholder="con_meet_id"
                            aria-label="default input example" value="<?php echo e($con_data->con_meet_id); ?>" disabled>
                        <?php $__errorArgs = ['con_meet_id'];
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
                    <div class="col-md-12 mb-3">
                        <label for="con_meet_id">Consultation Description</label>
                        <textarea class="form-control" name="con_desc" placeholder="Consultation Description"><?php echo e($con_data->con_desc); ?></textarea>
                        <?php $__errorArgs = ['con_desc'];
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
                        <input type="submit" class="update-btn " name="submit" value="Update Consultation">
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Badawy\Desktop\v0.2\HIS_Project_Kovido\resources\views/admin/admin_update_con.blade.php ENDPATH**/ ?>