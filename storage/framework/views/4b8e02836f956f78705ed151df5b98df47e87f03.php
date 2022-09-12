<?php
use Illuminate\Support\Facades\DB;
?>

<?php $__env->startSection('content'); ?>
<div class="main-data">
    <div class="row">
        <div class="col-md-3">
            <div class="data position-relative">
                <h3>Patients <br /><span class="ms-2"><?php $pat = DB::select('select * from patient'); echo count($pat); ?></span></h3>
                <i class="fa-solid fa-users me-3"></i>
            </div>
        </div>
        <div class="col-md-3">
            <div class="data position-relative">
                <h3>Doctors <br /><span class="ms-2"><?php $doc = DB::select('select * from doctor'); echo count($doc); ?></span></h3>
                <i class="fa-solid fa-user-doctor"></i>
            </div>
        </div>
        <div class="col-md-3">
            <div class="data position-relative">
                <h3>Dose <br /><span class="ms-2"><?php $dose = DB::select('select * from dose'); echo count($dose); ?></span></h3>
                <i class="fa-solid fa-square-virus"></i>
            </div>
        </div>
        <div class="col-md-3">
            <div class="data position-relative">
                <h3>Test <br /><span class="ms-2"><?php $test = DB::select('select * from test'); echo count($test); ?></span></h3>
                <i class="fa-solid fa-vials"></i>
            </div>
        </div>
        <div class="col-md-3">
            <div class="data position-relative">
                <h3>Messages <br /><span class="ms-2"><?php $msg = DB::select('select * from doc_pat'); echo count($msg); ?></span></h3>
                <i class="fa-solid fa-comment"></i>
            </div>
        </div>
        <div class="col-md-3">
            <div class="data position-relative">
                <h3>Consultation <br /><span class="ms-2"><?php $con = DB::select('select * from pat_consultation'); echo count($con); ?></span></h3>
                <i class="fa-solid fa-forward-fast"></i>
            </div>
        </div>
        <div class="col-md-3">
            <div class="data position-relative">
                <h3>Meeting <br /><span class="ms-2"><?php $meet = DB::select('select * from Meeting'); echo count($meet); ?></span></h3>
                <i class="fa-sharp fa-solid fa-video"></i>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\3rd_p\HIS_Project_Kovido\resources\views/admin/admin-dashbord.blade.php ENDPATH**/ ?>