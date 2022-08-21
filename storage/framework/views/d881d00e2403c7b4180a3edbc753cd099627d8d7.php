
<?php $__env->startSection('content'); ?>
<div class="page">
    <?php if(Session::has('success')): ?>
    <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
    <?php endif; ?>

    <?php if(Session::has('fail')): ?>
    <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
    <?php endif; ?>
    <?php if(count($my_tests)==0): ?>
    <h5 class="table_heading_3">you don't have any reservations</h2>
        <a class="link " href="/new_test" style="color:blue; margin-left : 470px "> Make Reservation </a>
        <?php endif; ?>

        <?php if(count($my_tests) > 0): ?>
        <h3 class="table_heading_3">Your reservation list </h3>
        <table class="layout display responsive-table">
            <thead>
                <tr>
                    <th class="t_name_col_width ">Test name</th>
                    <th class="t_date_col_width ">Date</th>
                    <th class="t_time_col_width">Time</th>
                    <th class="t_time_col_width">Address</th>
                    <th class="t_actions_col_width ">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $my_tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testcase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="t_name_col_width "><?php echo e($testcase->test_name); ?></td>
                    <td class="t_date_col_width "><?php echo e($testcase->pat_test_date); ?></td>
                    <td class="t_time_col_width "><?php echo e($testcase->pat_test_time); ?></td>
                    <td class="t_time_col_width "><?php echo e($testcase->hc_name); ?></td>


                    <td class="t_action_col_width">
                        <button class="btn btn-primary mb-3 submit table_button" onclick="window.location.href = '/update_test/<?php echo e($testcase->res_id); ?>';"> Edit </button>
                        <button class="btn btn-primary mb-3 submit table_button" style="background-color:red" onclick="window.location.href = '/delete/<?php echo e($testcase->res_id); ?>';"> Remove </button>
                    </td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!-- <?php for($i = 0; $i < count($my_tests) ; $i++): ?>
                <tr>
                    <td class="t_name_col_width ">$my_tests[i]->test_name</td>
                    <td class="t_date_col_width "></td>
                    <td class="t_time_col_width "></td>
                    <td class="t_action_col_width">
                        <button class="btn btn-primary mb-3 submit table_button" onclick="window.location.href = '/update_test';"> Edit </button>
                        <button class="btn btn-primary mb-3 submit table_button"> Remove </button>
                    </td>
                </tr>
            <?php endfor; ?> -->
            </tbody>
        </table>
        <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Badawy\Desktop\HIS_Project_Kovido\resources\views/my_tests.blade.php ENDPATH**/ ?>