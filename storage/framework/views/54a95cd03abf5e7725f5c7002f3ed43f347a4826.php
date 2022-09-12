<!-- Badawy -->

<?php $__env->startSection('content'); ?>
    <div class="service-page">
        <div class="container text-center">
            <h2 class="head-cards h2 py-3">Choose The Best For You</h2>
            <section>
                <div class="row">
                    <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <article class="col-md-4 d-flex align-items-stretch">
                            <div class="card px-2 py-2 mb-5" style="min-width: 100%">
                                <div class="live-img">
                                    <img src="../images/avatar.png" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body text-start">
                                    <h4 class="card-title mb-4">Dr/ <?php echo e($doctor->doc_fname . ' ' . $doctor->doc_lname); ?>

                                    </h4>
                                    <div class="real-data live-doc">
                                        <h5 class="live-doc-card">Email :</h5>
                                        <span class="h6">
                                            <?php echo e($doctor->doc_email); ?>

                                        </span>
                                    </div>
                                    <div class="real-data live-doc">
                                        <h5 class="live-doc-card">Phone :</h5>
                                        <span class="h6">
                                            <?php echo e($doctor->doc_phone); ?>

                                        </span>
                                    </div>
                                    <div class="real-data live-doc">
                                        <h5 class="live-doc-card">Age :</h5>
                                        <span class="h6">
                                            <?php echo e($doctor->doc_age); ?>

                                        </span>
                                    </div>
                                    <div class="real-data live-doc">
                                        <h5 class="live-doc-card">Avaliable :</h5>
                                        <span class="h6">
                                            8:00pm - 9:00pm
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="/confirm_con/<?php echo e($doctor->doc_id); ?>"
                                        class="btn-front card-btn btn btn-primary mb-3 py-2">Book
                                        Now</a>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Badawy\Desktop\v0.2\HIS_Project_Kovido\resources\views/meeting/live.blade.php ENDPATH**/ ?>