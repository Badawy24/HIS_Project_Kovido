<?php $__env->startSection('content'); ?>
<div class="doc-data">
    <div class="container">
        <p class="doc-btn">
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Get Doctor Data Now <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
            </button>
        </p>
        <?php if(session('doctors')): ?>
        <div class="report collapse" id="collapseExample">
            <div class="card card-body">
                <p class="head">Data About <?php echo e(count(session('doctors'))); ?> doctors in System <br />
                Date : <?php $date = date('d-m-y h:i:s'); echo $date; ?></p>
                <hr>
                <table >
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th></th>
                    </tr>
                    <?php $__currentLoopData = session('doctors'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($doc->doc_id); ?></td>
                            <td><?php echo e($doc->doc_fname . ' ' . $doc->doc_lname); ?></td>
                            <td><?php echo e($doc->doc_age); ?></td>
                            <td><?php echo e($doc->doc_phone); ?></td>
                            <td><?php echo e($doc->doc_email); ?></td>
                            <td><?php echo e($doc->doc_pass); ?></td>
                            <td>
                                <a href="/admin_doc_data/<?php echo e($doc->doc_id); ?>">
                                    <button type="button" class="btn btn-danger del-doc">Delete</button>
                                </a>
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
                        <?php echo e(session('msg')); ?>

                    </div>
                </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\third_year_training\HIS_Project_Kovido\resources\views/admin/admin_doc_data.blade.php ENDPATH**/ ?>