
<?php $__env->startSection('content'); ?>
    <div class="doc-data">
        <div class="container">
            <p class="doc-btn">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Get Live Consultation Data Now <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
                </button>
            </p>
            <?php if(session('con_data')): ?>
                <div class="report collapse" id="collapseExample">
                    <div class="card card-body">
                        <p class="head">Data About <span><?php echo e(count(session('con_data'))); ?></span> Consultation in
                            System <br />
                            Date : <?php $date = date('d-m-y h:i:s');
                            echo $date; ?></p>
                        <hr>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Duration</th>
                                    <th>patient Name</th>
                                    <th>Doctor Name</th>
                                    <th>Edit</th>
                                    <th>Del</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = session('con_data'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $con): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($con->con_id); ?></td>
                                        <td><?php echo e($con->con_title); ?></td>
                                        <td><?php echo e($con->con_desc); ?></td>
                                        <td><?php echo e($con->con_date); ?></td>
                                        <td><?php echo e($con->con_time); ?></td>
                                        <td><?php echo e($con->con_duration); ?></td>
                                        <td><?php echo e($con->pat_fname . ' ' . $con->pat_lname); ?></td>
                                        <td><?php echo e($con->doc_fname . ' ' . $con->doc_lname); ?></td>
                                        <td class="report-icon">
                                            <a href="/admin_dose_data_update/<?php echo e($con->con_id); ?>">
                                                <i class="edit-icon fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                        <td class="report-icon">
                                            <a href="/admin_dose_data_del/<?php echo e($con->con_id); ?>">
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

<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\3rd_training_project\new\HIS_Project_Kovido\resources\views/admin/admin_live.blade.php ENDPATH**/ ?>