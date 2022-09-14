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
                <div class="row justify-content-md-center text-center">
                    <?php if(Session::has('liveBokked')): ?>
                        <div class="col-md-4 alert alert-success d-flex align-items-center" role="alert">
                            <i class="fa-regular fa-circle-check"></i>
                            &nbsp;
                            <div>
                                <?php echo e(Session::get('liveBokked')); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(Session::has('noInternet')): ?>
                        <div class="col-md-4 alert alert-danger d-flex align-items-center" role="alert">
                            <i class="fa-regular fa-circle-error"></i>
                            &nbsp;
                            <div>
                                <?php echo e(Session::get('noInternet')); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(Session::has('allreadyliveBokked')): ?>
                        <div class="col-md-6 alert alert-danger d-flex align-items-center" role="alert">
                            <i class="fa-regular fa-circle-error"></i>
                            &nbsp;
                            <div>
                                <?php echo e(Session::get('allreadyliveBokked')); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>

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
                                <button class="card-btn btn btn-front btn-danger btn-pro mb-3 py-2" type="button"
                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
                                    aria-controls="offcanvasTop">Check Your Meeting</button>
                            </div>
                            <div class="offcanvas offcanvas-top card-join-meeting" tabindex="-1" id="offcanvasTop"
                                aria-labelledby="offcanvasTopLabel">
                                <h5 id="offcanvasTopLabel" class="text-center mt-4">Live Consultation Information</h5>
                                <?php if($meetingData == null): ?>
                                    <div class="offcanvas-body ">
                                        <div class="row justify-content-md-center text-center">
                                            <div class="col-md-4 alert alert-danger d-flex align-items-center"
                                                role="alert">
                                                <div>
                                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                                    &nbsp;
                                                    You Don't Have Any Live Consultation
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="offcanvas-body ">
                                        <div class="row justify-content-md-center text-center">
                                            <div class="col-md-5 card">
                                                <div class="card-body">
                                                    <div class="card-body text-start">
                                                        <h4 class="card-title mb-1">Title :
                                                            <?php echo e($meetingData[0]->con_title); ?>

                                                        </h4>
                                                        <h4 class="card-title mb-1">Date :
                                                            <?php echo e($meetingData[0]->con_date); ?>

                                                        </h4>
                                                        <h4 class="card-title mb-1">Time :
                                                            <?php echo e($meetingData[0]->con_time); ?>

                                                        </h4>
                                                        <?php $doc_n = DB::select('select * from doctor where doc_id = ?', [$meetingData[0]->doc_id]); ?>
                                                        <h4 class="card-title mb-1">Doctor :
                                                            <?php echo e($doc_n[0]->doc_fname . ' ' . $doc_n[0]->doc_lname); ?>

                                                        </h4>
                                                    </div>
                                                    <form action="/startMeeting" method="get" class="d-inline-block">
                                                        <input type="hidden" id="joinMeetingId"
                                                            value="<?php echo e($meetingData[0]->con_meet_id); ?>">

                                                        <?php if(date('Y-m-d h:i', strtotime('+2 hours')) < $meetingData[0]->con_date . ' ' . $meetingData[0]->con_time): ?>
                                                            <button disabled class="btn btn-primary">Join</button>
                                                        <?php else: ?>
                                                            <button type="submit" id="meetingJoinButton"
                                                                onclick="validateMeeting()"
                                                                class="btn btn-primary">Join</button>
                                                        <?php endif; ?>
                                                    </form>
                                                    <form action="/admin_con_del/<?php echo e($meetingData[0]->con_id); ?>"
                                                        class=" d-inline-block">
                                                        <button class="btn btn-danger">Cancel</button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="card-body d-inline-block">
                                <a href="/Editprofile" class="card-btn btn btn-front btn-primary btn-pro mb-3 py-2">Edit
                                    Your
                                    Profile</a>
                            </div>
                            <div class="card-body d-inline-block">
                                <a href="/change_pass_patient/<?php echo e($patients[0]->pat_id); ?>"
                                    class="card-btn btn btn-front btn-primary btn-pro mb-1 py-2"> Change
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

                <div class="row justify-content-md-center msg-rep">
                    <div class="col-md-8 ">
                        <div class="msg-content msgs-box">
                            <h3>You have Sent <?php
                            $pat_id = $patients[0]->pat_id;
                            $msgs = DB::select('select * from doc_pat where pat_id = ?', [$pat_id]);
                            echo count($msgs);
                            $i = 1;
                            ?> Messages : </h3>
                            <div class="all-msgs">
                                <?php $__currentLoopData = $msgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="one-msg row">
                                        <div class="col-md-8">
                                            <div class="msg-content">
                                                <span>Message #<?php echo $i;
                                                $i++; ?> :</span>
                                                <?php echo e($m->message); ?>

                                            </div>
                                        </div>
                                        <div class="col-md-8 offset-md-4">
                                            <?php if($m->reply == ''): ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <i class="fa-solid fa-triangle-exclamation me-2"></i>No
                                                    reply yet
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

<?php $__env->startSection('scripts'); ?>
    <script src="../js/meeting/meeting.js"></script>
    <script src="https://sdk.videosdk.live/js-sdk/0.0.37/videosdk.js"></script>
    <script src="../js/meeting/config.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Badawy\Desktop\v0.2\HIS_Project_Kovido\resources\views/profile.blade.php ENDPATH**/ ?>