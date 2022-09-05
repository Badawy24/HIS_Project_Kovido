<?php $__env->startSection('content'); ?>
<?php if(session('patientData')): ?>

<?php if(session('patient_deleted')): ?>
<div class="alerto info">
    <span class="closebtn">&times;</span>
    <strong>Info!</strong> <?php echo e(Session::get('patient_deleted')); ?>.
</div>
<?php endif; ?>

<form action="/admin_patient_data_show" method="post">
    <table class="patient">
        <caption>A summary of the patients recorded in system</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Phone</th>
                <th>ssn</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = session('patientData'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td> <?php echo e($patient->pat_id); ?> </td>
                <td> <?php echo e($patient->pat_fname . ' ' . $patient->pat_lname); ?> </td>
                <td> <?php echo e($patient->pat_age); ?> </td>
                <td> <?php echo e($patient->pat_address); ?> </td>
                <td> <?php echo e($patient->pat_phone); ?> </td>
                <td> <?php echo e($patient->pat_SSN); ?> </td>
                <td>
                    <a href="/admin_patient_data_show/delete_doc/<?php echo e($patient->pat_id); ?>">
                        <button type="button" class="btn btn-danger del-doc">Delete</button>
                    </a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</form>

<?php else: ?>
<p>does not exist</p>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\third_year_training\HIS_Project_Kovido\resources\views/admin/patient_data_show.blade.php ENDPATH**/ ?>