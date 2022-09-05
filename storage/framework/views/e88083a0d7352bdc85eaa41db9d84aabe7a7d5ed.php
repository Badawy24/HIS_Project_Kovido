<?php $__env->startSection('content'); ?>
    <div class="doc-data">
        <div class="container">
            <p class="doc-btn">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Get Dose Data Now <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
                </button>
            </p>
            <?php if(session('dose_data')): ?>
                <div class="report collapse" id="collapseExample">
                    <div class="card card-body">
                        <p class="head">Data About <span><?php echo e(count(session('dose_data'))); ?></span> Reservation Doses in
                            System <br />
                            Date : <?php $date = date('d-m-y h:i:s');
                            echo $date; ?></p>
                        <hr>
                        <table>
                            <tr>
                                <th>Patient Name</th>
                                <th>Dose Name</th>
                                <th>First Dose</th>
                                <th>Second Dose</th>
                                <th>Time Dose</th>
                                <th>Health Care Center</th>
                                <th>HC Address</th>
                                <th>Edit</th>
                                <th>Del</th>
                            </tr>
                            <?php $__currentLoopData = session('dose_data'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dose): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($dose->pat_fname . ' ' . $dose->pat_lname); ?></td>
                                    <td><?php echo e($dose->vaccine_name); ?></td>
                                    <td><?php echo e($dose->pat_dose_date); ?></td>
                                    <td><?php echo e(date('Y-m-d', strtotime($dose->pat_dose_date . '+ 14 days'))); ?></td>
                                    <td><?php echo e($dose->pat_dose_time); ?></td>
                                    <td><?php echo e($dose->hc_name); ?></td>
                                    <td><?php echo e($dose->hc_address); ?></td>
                                    <td class="report-icon">
                                        <a href=""><i
                                                class="edit-icon fa-solid fa-pen-to-square"></i></a>
                                    </td>
                                    <td class="report-icon">
                                        <a href="/admin_dose_data_del/<?php echo e($dose->pat_id); ?>"><i
                                                class="del-icon fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Badawy\Desktop\v0.1\HIS_Project_Kovido\resources\views/admin/admin_dose_data.blade.php ENDPATH**/ ?>