<?php 
use Illuminate\Support\Facades\DB;
?>

<?php $__env->startSection('content'); ?>

<div class="doc-data">
    <div class="container">
        <?php if(session('dose_data')): ?>
        <p class="doc-btn">
            <button class="btn btn-primary" type="submit" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Get Data Know <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
            </button>
        </p>
        <div class="report collapse" id="collapseExample">
            <div class="card card-body">
                <div class="row">
                    <h4 class='p-2'>There is <?php echo e(count(session('dose_data'))); ?> Dose Reservation : </h4>
                    <p class="lead"><b>Time :</b> <?php $date = date('d-m-y h:i:s'); echo $date; ?></pclass->
                    <?php $__currentLoopData = session('dose_data'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dose): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="doc col-12">
                        <h5>Patient Name : <?php $name = DB::select('select * from patient where pat_id = ?',[$dose->pat_id]);
                        echo $name[0]->pat_fname . ' ' . $name[0]->pat_lname; ?> </h5>
                        <p class="lead"><strong>Dose Name : </strong><?php $dname = DB::select('select * from dose where dose_id = ?',[$dose->dose_id]);
                            echo $dname[0]->vaccine_name; ?></p>
                        <p class="lead"><strong>Date : </strong> <?php echo e($dose->pat_dose_date . ' ' . $dose->pat_dose_time); ?> </p>
                        <p class="lead"><strong>Health Care Center Name: </strong><?php $hname = DB::select('select * from healthcare_center where hc_id = ?',[$dose->dose_patient_health]);
                            echo $hname[0]->hc_name; ?></p>
                        <p class="lead"><strong>Health Care Center Address: </strong><?php echo $hname[0]->hc_address; ?></p> 
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if(Session::has('message')): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo e(Session::get('message')); ?>

        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Badawy\Desktop\backUpp - Copy\HIS_Project_Kovido\resources\views/admin/admin_dose_data.blade.php ENDPATH**/ ?>