<?php
use Illuminate\Support\Facades\DB;
?>

<?php $__env->startSection('content'); ?>
    <div class='form'>
        <div class="container">

            <form action='admin_test_data' method='post' class="row">

                <div class="col-md-8">
                    <?php echo csrf_field(); ?>
                    <select class="form-select" aria-label="Default select example" name="pat_id">
                        <option selected disabled>Choose Patient Name</option>
                        <?php $__currentLoopData = session('pat_name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($pat->pat_id); ?>"> <?php echo e($pat->pat_fname . ' ' . $pat->pat_lname); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="col-md-4">
                    <input type="submit" class="btn btn mb-3 submit search-btn" value="Search">
                </div>

            </form>

        </div>

    </div>

    <div class="doc-data">

        <div class="container">

            <?php if(Session::has('tests')): ?>

                <p class="doc-btn">
                    <button class="btn btn-primary" type="submit" data-bs-toggle="collapse"
                        data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Get Patient Reservations Now <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
                    </button>
                </p>

                <div class="report collapse" id="collapseExample">

                    <div class="card card-body">

                        <div class="row">
                            <h4 class='p-2'>There is <?php echo e(count(Session::get('tests'))); ?> Tests For <?php $pname = DB::select('select * from patient where pat_id = ?', [Session::get('tests')[0]->pat_id]);
                            echo $pname[0]->pat_fname . ' ' . $pname[0]->pat_lname; ?> :
                            </h4>

                            <p class="lead"><b>Time :</b> <?php $date = date('d-m-y h:i:s');
                            echo $date; ?></pclass->

                                <?php $__currentLoopData = Session::get('tests'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="doc col-12">
                                        <p class="lead"><strong>Test Name : </strong><?php $tname = DB::select('select * from test where test_id = ?', [$test->test_id]);
                                        echo $tname[0]->test_name; ?></p>
                                        <p class="lead"><strong>Date : </strong>
                                            <?php echo e($test->pat_test_date . ' ' . $test->pat_test_time); ?> </p>
                                        <p class="lead"><strong>Health Care Center Name: </strong><?php $hcname = DB::select('select * from healthcare_center where hc_id = ?', [$test->test_patient_health]);
                                        echo $hcname[0]->hc_name; ?></p>
                                        <p class="lead"><strong>Health Care Center Address: </strong><?php echo $hcname[0]->hc_address; ?>
                                        </p>
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

<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\T95_github\sum_tra_pro\HIS_Project_Kovido\resources\views/admin/admin_test_data.blade.php ENDPATH**/ ?>