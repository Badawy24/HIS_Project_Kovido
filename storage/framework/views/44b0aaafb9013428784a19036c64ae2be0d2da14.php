<!-- Badawy -->


<?php $__env->startSection('content'); ?>
    <div class="contact_us main-div-login booked">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card px-2 py-2 mb-5">
                        <div class="card-body">
                            <h3 class="card-title text-center">First Dose</h3>
                            <br>
                            <h4 class="card-title mb-4">Vaccine Name : <span><?php echo e($dose->vaccine_name); ?></span></h4>
                            <h4 class="card-title mb-4">Healthcare Center : <span><?php echo e($hecs->hc_name); ?></span></h4>
                            <h4 class="card-title mb-4">City : <span><?php echo e($hecs->hc_address); ?></span></h4>
                            <h4 class="card-title mb-4">Date : <span><?php echo e($appo->pat_dose_date); ?></span></h4>
                            <h4 class="card-title mb-4">Time : <span><?php echo e($appo->pat_dose_time); ?></span></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card px-2 py-2 mb-5">
                        <div class="card-body">
                            <h3 class="card-title text-center">Second Dose</h3>
                            <br>
                            <h4 class="card-title mb-4">Vaccine Name : <span><?php echo e($dose->vaccine_name); ?></span></h4>
                            <h4 class="card-title mb-4">Healthcare Center : <span><?php echo e($hecs->hc_name); ?></span></h4>
                            <h4 class="card-title mb-4">City : <span><?php echo e($hecs->hc_address); ?></span></h4>
                            
                            <h4 class="card-title mb-4">Date : <span
                                    style="color:red"><?php echo e(date('Y-m-d', strtotime($appo->pat_dose_date . '+ 14 days'))); ?></span>
                            </h4>
                            <h4 class="card-title mb-4">Time : <span><?php echo e($appo->pat_dose_time); ?></span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\projects\laravel\HIS_Project_Kovido\resources\views/alreadyBooked.blade.php ENDPATH**/ ?>