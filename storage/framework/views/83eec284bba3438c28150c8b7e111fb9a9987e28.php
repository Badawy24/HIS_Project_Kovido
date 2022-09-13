
<?php $__env->startSection('content'); ?>
<div class="main-div-login ">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <div class="test-form test_names ">

                    <?php if(Session::has('success')): ?>
                    <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                    <?php endif; ?>

                    <?php if(Session::has('fail')): ?>
                    <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
                    <?php endif; ?>



                    <div class="doc-data ">
                        <p class="head"> There is <span><?php echo e(count($tes_names)); ?></span> Tests Avilable on the System
                        </p>
                        <hr>
                    </div>

                    <table>

                        <thead>
                            <tr>
                                <th>Test ID </th>
                                <th>Test Name</th>
                                <th>Delete Test</th>
                            </tr>

                        </thead>


                        <tbody>

                            <?php $__currentLoopData = $tes_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($tes->test_id); ?></td>
                                <td><?php echo e($tes->test_name); ?></td>
                                <td class="report-icon">
                                    <a href="/admin_test_del/<?php echo e($tes->test_id); ?>">
                                        <i class="del-icon fa-solid fa-trash"></i>
                                    </a>
                                </td>

                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>

                    </table>



                    <button class="btn btn-primary mb-1 update-btn submit no_res_button admin_add_test_button " style="margin-left:120px" onclick="window.location.href = '/admin_add_test_details'"> Add New Test</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\T95_github\sum_tra_pro\HIS_Project_Kovido\resources\views/admin/admin_existed_test.blade.php ENDPATH**/ ?>