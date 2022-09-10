
<?php $__env->startSection('content'); ?>
<div class="main-div-login">
    <div class="container">
        <div class="row">
        <h6 style="text-align: center;">Here, you can add a petient</h6>
        <hr>
            <div class="register-form">
                <!-- ////////////// -->
                <form action="admin_add_test_details" method="POST" class="row">
                    <?php if(Session::has('success')): ?>
                    <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                    <?php endif; ?>

                    <?php if(Session::has('fail')): ?>
                    <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
                    <?php endif; ?>

                    <?php echo csrf_field(); ?>


                    <div class="col-md-6">
                        <input class=" form-control" type="text" placeholder="Test Name" name="test_name"  id="te_name" aria-label="default input example">

                    </div>




                    <div class="col-md-6">
                        <input type="submit" class=" update-btn  btn btn-primary mb-3 submit " value="Add Test" name="add_test">
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\T95_github\sum_tra_pro\HIS_Project_Kovido\resources\views/admin/admin_add_test_details.blade.php ENDPATH**/ ?>