<!-- Badawy -->

<?php $__env->startSection('content'); ?>
    <div class="service-page">
        <div class="container text-center">
            <h2 class="head-cards h2 py-3">Confirm Your Live Consultation</h2>
            <section>
                <div class="row justify-content-md-center">
                    <article class="col-md-5 d-flex align-items-stretch">
                        <div class="card px-2 py-2 mb-5" style="min-width: 100%">

                            <div class="card-body text-start">
                                <h4 class="card-title mb-4">Name : <?php echo e($patient->pat_fname . ' ' . $patient->pat_lname); ?></h4>
                                <h4 class="card-title mb-4">Doctor : <?php echo e($doctor->doc_fname . ' ' . $doctor->doc_lname); ?></h4>
                                <h4 class="card-title mb-4">Available : 8:00pm-9:00pm</h4>
                            </div>
                            <div class="card-body">
                                <form action="" class="row">
                                    <?php echo csrf_field(); ?>
                                    <input value="<?php echo e($patient->pat_id); ?>" type="hidden" name="pat_id">
                                    <input value="<?php echo e($doctor->doc_id); ?>" type="hidden" name="doc_id">
                                    <input value="20:00" type="hidden" name="con_time">
                                    <input value="" type="hidden" name="meetinId">
                                    <div class="col-lg-12">
                                        <input class="inp-form form-control" type="date" name="meetingdate"
                                            aria-label="default input example">
                                        <?php $__errorArgs = ['meetingdate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-lg-12">
                                        <input class="inp-form form-control" type="text" placeholder="Consultation Title"
                                            name="con_title" id="con_title" aria-label="default input example">
                                        <?php $__errorArgs = ['con_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea class="inp-form form-control" placeholder="Please Enter The Purpose of The Consultation" name="meetingDec"
                                            id="meetingDec" aria-label="default input example" style="height: 120px"></textarea>
                                        <?php $__errorArgs = ['meetingDec'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <input type="submit"
                                        value="Confirm "class="btn-front card-btn btn btn-primary mb-3 py-2">
                                </form>
                            </div>
                        </div>
                    </article>

                </div>

            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Badawy\Desktop\v0.2\HIS_Project_Kovido\resources\views/meeting/confirm.blade.php ENDPATH**/ ?>