<?php $__env->startSection('content'); ?>
    <div class="form-add-doc">
        <div class="container">
            <div class="doc-data ">
                <p class="head">Update Live Meeting of Doctor:
                    <span><?php echo e($meet_data->doc_fname . ' ' . $meet_data->doc_lname); ?></span>
                    <br />
                    Date : <?php $date = date('d-m-y h:i:s');
                    echo $date; ?>
                </p>
                <hr>
            </div>
            <form action="/admin_meet_update/<?php echo e($meet_data->meet_id); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php if(Session::has('success')): ?>
                    <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                <?php endif; ?>

                <?php if(Session::has('fail')): ?>
                    <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
                <?php endif; ?>
                <div class="row">

                    <input type="hidden" value="<?php echo e($meet_data->doc_id); ?>" name="doc_id">
                    <div class="col-md-6 update-inp">
                        <label for="doc_name">Doctor Name </label>
                        <input class="form-control" name="doc_name" type="text" aria-label="default input example"
                            value="<?php echo e($meet_data->doc_fname . ' ' . $meet_data->doc_lname); ?>" disabled>
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
                        <label for="meet_date">Meeting Date </label>
                        <input class="form-control" name="meet_date" type="date" placeholder="meet_date"
                            aria-label="default input example" value="<?php echo e($meet_data->meet_date); ?>"
                            min="<?php echo date('Y-m-d'); ?>">
                        <?php $__errorArgs = ['meet_date'];
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
                        <label for="meet_time">Meeting Time</label>
                        <input class="form-control" name="meet_time" type="time" placeholder="meet_time"
                            aria-label="default input example" value="<?php echo e($meet_data->meet_time); ?>">
                        <?php $__errorArgs = ['meet_time'];
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
                        <label for="meet_id">Meeting ID</label>
                        <input class="form-control" name="meet_id" type="text" placeholder="meet_id"
                            aria-label="default input example" value="<?php echo e($meet_data->meet_admin_id); ?>" disabled>
                        <?php $__errorArgs = ['meet_id'];
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
                        <label for="meet_desc">Meeting Description</label>
                        <textarea class="form-control" name="meet_desc" placeholder="Meeting Description"><?php echo e($meet_data->meet_desc); ?></textarea>
                        <?php $__errorArgs = ['meet_desc'];
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
                        <input type="submit" class="update-btn " name="submit" value="Update Meeting">
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Badawy\Desktop\v0.2\HIS_Project_Kovido\resources\views/admin/admin_update_meet.blade.php ENDPATH**/ ?>