
<?php $__env->startSection('content'); ?>
    <div>
        <div class="profile-page">
            <div class="container">
                <h2 class="head-cards h1 py-5 text-center">Welcome <span class="user-name">
                        <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($patient->pat_fname); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </span> To Kovidio

                </h2>
                <div class="row">
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
                                <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($patient->pat_fname); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </span>
                        </div>
                        <div class="real-data">
                            <h5>Last Name :</h5>
                            <span class="h5">
                                <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($patient->pat_lname); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </span>
                        </div>
                        <div class="real-data">
                            <h5>Email :</h5>
                            <span class="h5">
                                <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($patient->pat_email); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </span>
                        </div>
                        <div class="real-data">
                            <h5>Address :</h5>
                            <span class="h5">
                                <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($patient->pat_address); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </span>
                        </div>
                        <div class="real-data">
                            <h5>SSN :</h5>
                            <span class="h5">
                                <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($patient->pat_SSN); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </span>
                        </div>
                        <div class="real-data">
                            <h5>Phone :</h5>
                            <span class="h5">
                                <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($patient->pat_phone); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </span>
                        </div>
                        <div class="real-data">
                            <h5>Age :</h5>
                            <span class="h5">
                                <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($patient->pat_age); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </span>
                        </div>
                        <div class="real-data">
                            <h5>Birthday :</h5>
                            <span class="h5">
                                <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($patient->pat_DOF); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </span>
                        </div>
                        <div class="text-center">
                            <div class="card-body d-inline-block">
                                <a href="/Editprofile" class="card-btn btn btn-front btn-primary btn-pro mb-3 py-2">Edit
                                    Your
                                    Profile</a>
                            </div>
                            <div class="card-body d-inline-block">
                                <a href="/service" class="card-btn btn btn-front btn-primary btn-pro mb-3 py-2">Check
                                    Service</a>
                            </div>
                        </div>
                    </div>
                    <div class="img-profile col-md-7 text-center">
                        <div class="profile-img ">
                            <img id="profile" src="/images/profile.png" class="img-fluid" />
                        </div>
                    </div>
                </div>

                <div class="row justify-content-md-center">
                    <div class="col-md-8">
                        <div class="msg-content">
                            <h4>You have Sent #<?php
                            $pat_id = $patients[0]->pat_id;
                            $msgs = DB::select('select * from doc_pat where pat_id = ?', [$pat_id]);
                            echo count($msgs);
                            $i = 1;
                            ?> Messages : </h4>
                            <div class="all-msgs">
                                <?php $__currentLoopData = $msgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="one-msg row">
                                        <div class="col-md-6">
                                            Message #<?php echo $i;  $i++; ?> :
                                            <div class="msg-content">
                                                <?php echo e($m->message); ?>

                                            </div>
                                        </div>
                                        <div class="col-md-6 icon">
                                            Doctor Reply :
                                            <?php if($m->reply == ''): ?>
                                                <div class="alert alert-danger" role="alert">
                                                    A simple danger alert—check it out!
                                                </div>
                                            <?php else: ?>
                                            <div class="msg-reply">
                                                <?php echo e($m->reply); ?>

                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Badawy\Desktop\vvv\HIS_Project_Kovido\resources\views/profile.blade.php ENDPATH**/ ?>