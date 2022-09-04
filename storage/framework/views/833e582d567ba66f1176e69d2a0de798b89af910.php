
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
                <div class="row">
                    <h4 class='p-2'>Data About <?php echo e(count(session('doctors'))); ?> doctors in Our System : </h4>
                    <p class="lead"><b>Time :</b> <?php $date = date('d-m-y h:i:s'); echo $date; ?></pclass->
                    
                    <?php $__currentLoopData = session('doctors'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="doc col-md-6">
                            <h5>Doctor Name : <?php echo e($doc->doc_fname . ' ' . $doc->doc_lname); ?></h5>
                            <p class="lead">Age : <?php echo e($doc->doc_age); ?></p>
                            <p class="lead">Phone Number : <?php echo e($doc->doc_phone); ?></p>
                            <p class="lead">E-mail : <a href="#"> <?php echo e($doc->doc_email); ?> </a></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
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