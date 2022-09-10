<?php $__env->startSection('content'); ?>
    <div class="doc-data">
        <div class="container">
            <?php if(Session::has('success')): ?>
                <div class="alert alert-success"><span class="closebtn">×</span><?php echo e(Session::get('success')); ?></div>
            <?php endif; ?>

            <?php if(Session::has('fail')): ?>
                <div class="alert alert-danger"><span class="closebtn">×</span><?php echo e(Session::get('fail')); ?></div>
            <?php endif; ?>
            <p class="doc-btn">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Get Live Meeting Data Now <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
                </button>
            </p>
            <?php if(session('meet_data')): ?>
                <div class="report collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="row justify-content-between">
                            <div class="col-md-8">
                                <p class="head">Data About <span><?php echo e(count(session('meet_data'))); ?></span> Meeting in
                                    System <br />
                                    Date : <?php $date = date('d-m-y h:i:s');
                                    echo $date; ?></p>
                            </div>
                            <div class="col-md-2 con_add_btn">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Add <i class="fa-solid fa-plus ms-1"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add New Consultation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="con_add" action="admin_live_meet" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <select class="form-select" aria-label="Default select example"
                                                                name="doc_id">
                                                                <option selected disabled>Choose Host Doctor Name</option>
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
                                                                <div class="alert alert-danger d-flex align-items-center"
                                                                    role="alert">
                                                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                                                    <div> <?php echo e($message); ?> </div>
                                                                </div>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>

                                                        <div class="col-md-12 ">
                                                            <label for="">Meeting Date</label>
                                                            <input class="form-control" name="meet_date" type="date"
                                                                placeholder="Consultation Date"
                                                                aria-label="default input example"
                                                                value="<?php echo e(old('meet_date')); ?>" min="<?php echo date('Y-m-d'); ?>">
                                                            <?php $__errorArgs = ['meet_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <div class="alert
                                                                alert-danger d-flex align-items-center"
                                                                    role="alert">
                                                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                                                    <div> <?php echo e($message); ?> </div>
                                                                </div>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="col-md-12 ">
                                                            <label for="">Meeting Time</label>
                                                            <input class="form-control" name="meet_time" type="time"
                                                                placeholder="Consultation Time"
                                                                aria-label="default input example"
                                                                value="<?php echo e(old('meet_time')); ?>">
                                                            <?php $__errorArgs = ['meet_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <div class="alert alert-danger d-flex align-items-center"
                                                                    role="alert">
                                                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                                                    <div> <?php echo e($message); ?> </div>
                                                                </div>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="col-md-12 ">
                                                            <input class="form-control" name="meet_duration" type="number"
                                                                placeholder="Meeting Duration"
                                                                aria-label="default input example"
                                                                value="<?php echo e(old('con_duration')); ?>">
                                                            <?php $__errorArgs = ['meet_duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <div class="alert alert-danger d-flex align-items-center"
                                                                    role="alert">
                                                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                                                    <div> <?php echo e($message); ?> </div>
                                                                </div>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" name="meet_desc" placeholder="Meeting Description"></textarea>
                                                            <?php $__errorArgs = ['meet_desc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <div class="alert alert-danger d-flex align-items-center"
                                                                    role="alert">
                                                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                                                    <div> <?php echo e($message); ?> </div>
                                                                </div>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="submit" class="update-btn" name="submit"
                                                                value="Save Data">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- end of model -->
                            </div>
                        </div>


                        <hr>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Duration</th>
                                    <th>Doctor Name</th>
                                    <th>Edit</th>
                                    <th>Del</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = session('meet_data'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($meet->meet_id); ?></td>
                                        <td><?php echo e($meet->meet_desc); ?></td>
                                        <td><?php echo e($meet->meet_date); ?></td>
                                        <td><?php echo e($meet->meet_time); ?></td>
                                        <td><?php echo e($meet->meet_duration); ?></td>
                                        <td><?php echo e($meet->doc_fname . ' ' . $meet->doc_lname); ?></td>
                                        <td class="report-icon">
                                            <a href="/admin_dose_data_update/<?php echo e($meet->meet_id); ?>">
                                                <i class="edit-icon fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                        <td class="report-icon">
                                            <a href="/admin_dose_data_del/<?php echo e($meet->meet_id); ?>">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Badawy\Desktop\HIS_Project_Kovido\resources\views/admin/admin_live_meet.blade.php ENDPATH**/ ?>