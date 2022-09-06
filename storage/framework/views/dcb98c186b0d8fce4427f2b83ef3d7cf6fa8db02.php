
<?php $__env->startSection('content'); ?>
    <div class="doc-data">
        <div class="container">
            <?php if(session('patient_deleted')): ?>
                <div class="alerto info">
                    <span class="closebtn">&times;</span>
                    <strong>Info!</strong> <?php echo e(Session::get('patient_deleted')); ?>.
                </div>
            <?php endif; ?>
            <p class="doc-btn">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Get Patient Data Now <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
                </button>
            </p>
            <?php if(session('patientData')): ?>
                <div class="report collapse" id="collapseExample">
                    <div class="card card-body">
                        <p class="head">Data About <span><?php echo e(count(session('patientData'))); ?></span> Patients in System
                            <br />
                            Date : <?php $date = date('d-m-y h:i:s');
                            echo $date; ?>
                        </p>
                        <hr>
                        <form action="/admin_patient_data_show" method="post">
                            <table class="patient">
                                <caption>A summary of the patients recorded in system</caption>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>SSN</th>
                                        <th>Birth Day</th>
                                        <th>Age</th>
                                        <th>Edit</th>
                                        <th>Del</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = session('patientData'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td> <?php echo e($patient->pat_id); ?> </td>
                                            <td> <?php echo e($patient->pat_fname . ' ' . $patient->pat_lname); ?> </td>
                                            <td> <?php echo e($patient->pat_email); ?> </td>
                                            <td> <?php echo e($patient->pat_address); ?> </td>
                                            <td> <?php echo e($patient->pat_phone); ?> </td>
                                            <td> <?php echo e($patient->pat_SSN); ?> </td>
                                            <td> <?php echo e($patient->pat_DOF); ?> </td>
                                            <td> <?php echo e($patient->pat_age); ?> </td>
                                            <td class="report-icon">
                                                <a href="">
                                                    <i class="edit-icon fa-solid fa-pen-to-square"></i>
                                                </a>
                                            </td>
                                            <td class="report-icon">
                                                <a href="/admin_patient_data_show/delete_doc/<?php echo e($patient->pat_id); ?>">
                                                    <i class="del-icon fa-solid fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            <?php else: ?>
                <p>does not exist</p>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\final\new\HIS_Project_Kovido\resources\views/admin/patient_data_show.blade.php ENDPATH**/ ?>