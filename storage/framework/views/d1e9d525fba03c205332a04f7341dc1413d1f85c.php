
<?php $__env->startSection('content'); ?>
    <div class="form-add-doc">
        <div class="container">
            <div class="doc-data">
                <div class="card card-body">
                    <p class="head">There is <span><?php echo e(count(session('dose_type'))); ?></span> Vaccines in System</p>
                </div>
            </div>
            <hr>
            <form action="dose_add" method="post">
                <?php echo csrf_field(); ?>
                <?php if(Session::has('success')): ?>
                    <div class="col-md-8 alert alert-success"><?php echo e(Session::get('success')); ?></div>
                <?php endif; ?>
                <?php if(Session::has('error')): ?>
                    <div class="col-md-8 alert alert-danger"><?php echo e(Session::get('error')); ?></div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-6 update-inp">
                        <input class="form-control" name="dose_name" type="text" placeholder="Vaccine Name"
                            aria-label="default input example" value="<?php echo e(old('dose_name')); ?>">
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
                    <div class="col-md-6">
                        <input type="submit" class="update-btn" value="Add Vaccine">
                    </div>
                </div>
            </form>
            <br>
            <section>
                <div class="doc-data">
                    <div class="container">
                        <p class="doc-btn">
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Get Vaccine Data Now <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
                            </button>
                        </p>
                        <div class="text-center">
                            <?php if(Session::has('update')): ?>
                                <div class="alert alert-success"><i class="edit-icon fa-solid fa-pen-to-square"></i>
                                    <?php echo e(Session::get('update')); ?></div>
                            <?php endif; ?>
                            <?php if(Session::has('del')): ?>
                                <div class="alert alert-danger"><i class="del-icon fa-solid fa-trash"></i>
                                    <?php echo e(Session::get('del')); ?></div>
                            <?php endif; ?>
                        </div>
                        <?php if(session('dose_type')): ?>
                            <div class="report collapse" id="collapseExample">
                                <div class="card card-body">
                                    <hr>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Vaccine ID</th>
                                                <th>Vaccine name</th>
                                                <th>Delete Vaccine</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = session('dose_type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dose): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($dose->dose_id); ?></td>
                                                    <td><?php echo e($dose->vaccine_name); ?></td>
                                                    <td class="report-icon">
                                                        <a href="/del_data_dose/<?php echo e($dose->dose_id); ?>">
                                                            <i class="del-icon fa-solid fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="no-doc collapse" id="collapseExample">
                                <div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <div>
                                        <?php echo e(session('message')); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Badawy\Desktop\v0.2\HIS_Project_Kovido\resources\views/admin/admin_add_dose.blade.php ENDPATH**/ ?>