<?php
use Illuminate\Support\Facades\DB;
?>

<?php $__env->startSection('content'); ?>
<div class="profile-page">
    <div class="container">
        <h2 class="head-cards h1 py-5 text-center">Welcome <span class="user-name">
                    <?php echo e($doctor[0]->doc_fname); ?>

            </span> To Kovidio

        </h2>
        <div class="row pb-5">
            <div class="user-data col-md-5">

                <h2 class="text-center head-cards">Personal Data</h2>
                <?php if(Session::has('error')): ?>
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <div>
                            <i class="fa-solid fa-triangle-exclamation"></i>
                            &nbsp;
                            <?php echo e(Session::get('error')); ?>

                        </div>
                    </div>
                <?php endif; ?>
                <?php if(Session::has('success')): ?>
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <i class="fa-regular fa-circle-check"></i>
                        &nbsp;
                        <div>
                            <?php echo e(Session::get('success')); ?>

                        </div>
                    </div>
                <?php endif; ?>
                <div class="real-data">
                    <h5>First Name :</h5>
                    <span class="h5">
                            <?php echo e($doctor[0]->doc_fname); ?>

                    </span>
                </div>
                <div class="real-data">
                    <h5>Last Name :</h5>
                    <span class="h5">
                            <?php echo e($doctor[0]->doc_lname); ?>

                    </span>
                </div>
                <div class="real-data">
                    <h5>Email :</h5>
                    <span class="h5">
                            <?php echo e($doctor[0]->doc_email); ?>

                    </span>
                </div>
                <div class="real-data">
                    <h5>Phone :</h5>
                    <span class="h5">
                            <?php echo e($doctor[0]->doc_phone); ?>

                    </span>
                </div>
                <div class="real-data">
                    <h5>Age :</h5>
                    <span class="h5">
                            <?php echo e($doctor[0]->doc_age); ?>

                    </span>
                </div>
                <div class="text-center">
                    <div class="card-body d-inline-block">
                        <a href="/edit_profile_doc" class="card-btn btn btn-front btn-primary btn-pro mb-3 py-2">Edit
                            Your
                            Profile</a>
                    </div>
                    <div class="card-body d-inline-block">
                        <a href="/change_pass_doc" class="card-btn btn btn-front btn-primary btn-pro mb-1 py-2"> Change
                            Password</a>
                    </div>
                </div>
            </div>
            <div class="img-profile col-md-7 text-center">
                <div class="profile-img ">
                    <img id="profile" src="/images/profile.png" class="img-fluid" />
                </div>
            </div>
        </div>






<?php $__env->stopSection(); ?>
<?php echo $__env->make('main-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Badawy\Desktop\v0.2\HIS_Project_Kovido\resources\views/doc_profile.blade.php ENDPATH**/ ?>