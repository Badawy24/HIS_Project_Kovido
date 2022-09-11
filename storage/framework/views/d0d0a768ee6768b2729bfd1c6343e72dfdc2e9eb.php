<?php $__env->startSection('content'); ?>
    <div class="main-div-login">
        <div class="container">
            <form action="update_data" method="POST" class="register-form test-form ">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="res_id" value="<?php echo e($res_id); ?>">
                <section class="row">
                    <div class="col-md-6">

                        <div class="col-md-12">
                            <label class="card-text" style="margin-left : 300px">Test</label>
                            <input class="inp-form form-control" style="text-align: center;" disabled type="text"
                                value="<?php echo e($my_test); ?>" name="test_name" id="test_name"
                                aria-label="default input example">
                        </div>

                        <div class="col-md-12">
                            <label class="card-text" style="margin-left : 250px">Health Care Center</label>
                            <input class="inp-form form-control" style="text-align: center;" disabled type="text"
                                value="<?php echo e($my_hcc); ?>" name="health_cc" id="health_cc"
                                aria-label="default input example">
                        </div>



                        <div class="col-md-12">
                            <label class="card-text">Date</label>
                            <input class="inp-form form-control" type="date" value="<?php echo e($my_date); ?>"
                                placeholder="test_date" name="test_date" id="test_date" aria-label="default input example"
                                min="<?php echo date('Y-m-d'); ?>">
                        </div>

                        <div class="col-md-12">
                            <label class="card-text">Time</label>
                            <input class="form-control" type="time" value="<?php echo e($my_time); ?>" name="test_time"
                                placeholder="test_time" id="test_time" aria-label="default input example">
                        </div>

                        <input type="reset" class="btn btn-primary mb-3 submit update_button_margin" value="Reset">
                        <input type="submit" class="btn btn-primary mb-3 submit update_button_margin" value="Confirm">


                    </div>

                    <div class="col-md-6">
                        <div class="login-img">
                            <img id="updateTest" src="/images/update_test.png" class="update_form_img" />
                        </div>
                    </div>

                </section>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Badawy\Desktop\HIS_Project_Kovido\resources\views/update_test.blade.php ENDPATH**/ ?>