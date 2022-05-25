<?php
use Illuminate\Support\Facades\DB;
?>

<?php $__env->startSection('content'); ?>
<div class='form'>
    <div class="container">
        <form action='admin_doc_msg' method='post' class="row">
            <div class= "col-md-8">
                <?php echo csrf_field(); ?>
                <select class="form-select" aria-label="Default select example" name="doc_mail">
                    <option selected disabled>Choose Doctor Name</option>
                    <?php $__currentLoopData = session('pat_name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value= "<?php echo e($pat->pat_id); ?>"> <?php echo e($pat->pat_fname . ' ' . $pat->pat_lname); ?> </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-4">
                <input type="submit" class="btn btn-primary mb-3 submit" value="Search">
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\new clone\HIS_Project_Kovido\resources\views/admin/admin_test_data.blade.php ENDPATH**/ ?>