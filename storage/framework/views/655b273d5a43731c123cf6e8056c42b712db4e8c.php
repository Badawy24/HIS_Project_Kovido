<?php $__env->startSection('content'); ?>
    <div class="doc-data">
        <div class="container">
            <p class="doc-btn">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Get Live Meeting Data Now <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
                </button>
            </p>
            <?php if(session('meet_data')): ?>
                <div class="report collapse" id="collapseExample">
                    <div class="card card-body">
                        <p class="head">Data About <span><?php echo e(count(session('meet_data'))); ?></span> Meeting in
                            System <br />
                            Date : <?php $date = date('d-m-y h:i:s');
                            echo $date; ?></p>
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

<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Badawy\Desktop\vvv\HIS_Project_Kovido\resources\views/admin/admin_live_meet.blade.php ENDPATH**/ ?>