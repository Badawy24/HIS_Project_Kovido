
<?php $__env->startSection('content'); ?>
<div class="doc-data">
        <div class="container">

            <p class="doc-btn">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Get Test Reservation Data Now <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
                </button>
            </p>

            <?php if(session('alltests')): ?>
                <div class="report collapse" id="collapseExample">

                    <div class="card card-body">

                        <p class="head">Data About <span><?php echo e(count(session('alltests'))); ?></span> Test Reservations in
                            System <br />
                            Date : <?php $date = date('d-m-y h:i:s');
                            echo $date; ?></p>
                        <hr>

                        <table>

                            <thead>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Test Name</th>
                                    <th>Test Date</th>
                                    <th>Test time</th>
                                    <th>Health Care Center</th>
                                    <th>HC Address</th>
                                    <th>Edit</th>
                                    <th>Del</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php $__currentLoopData = session('alltests'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($test->pat_fname . ' ' . $test->pat_lname); ?></td>
                                        <td><?php echo e($test->test_name); ?></td>
                                        <td><?php echo e($test->pat_test_date); ?></td>
                                        <td><?php echo e($test->pat_test_time); ?></td>
                                        
                                        <td><?php echo e($test->hc_name); ?></td>
                                        <td><?php echo e($test->hc_address); ?></td>

                                        <td class="report-icon">
                                            <a href="/admin_test_data_update/<?php echo e($test->res_id); ?>">
                                                <i class="edit-icon fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </td>

                                        <td class="report-icon">
                                            <a href="/admin_test_re_del/<?php echo e($test->res_id); ?>">
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

<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Badawy\Desktop\vvv\HIS_Project_Kovido\resources\views/admin/admin_all_tests.blade.php ENDPATH**/ ?>