<?php 
use Illuminate\Support\Facades\DB;
?>

<?php $__env->startSection('content'); ?>
<div class='form'>
    <div class="container">
        <form action='admin_doc_msg' method='post' class="row">
            <div class= "col-md-8">
                <?php echo csrf_field(); ?>
                <select class="form-select" aria-label="Default select example" name="doc_mail">
                    <option selected disabled>Choose Doctor Name</option>
                    <?php $__currentLoopData = session('doc_name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value= "<?php echo e($doc->doc_email); ?>"> <?php echo e($doc->doc_fname . ' ' . $doc->doc_lname); ?> </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-4">
                <input type="submit" class="btn btn-primary mb-3 submit" value="Search">
            </div>
        </form>
    </div>
</div>
<div class="doc-data">
    <div class="container">
        <?php if(Session::has('doc_msg')): ?>
        <p class="doc-btn">
            <button class="btn btn-primary" type="submit" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Get Message Know <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
            </button>
        </p>
        <div class="report collapse" id="collapseExample">
            <div class="card card-body">
                <div class="row">
                    <h4 class='p-2'>There is <?php echo e(count(Session::get('doc_msg'))); ?> Message For Doctor <?php $dname = DB::select('select * from doctor where doc_email = ?', [Session::get('doc_email')]);
                        echo $dname[0]->doc_fname . ' ' . $dname[0]->doc_lname; ?> : </h4>
                    <p class="lead"><b>Time :</b> <?php $date = date('d-m-y h:i:s'); echo $date; ?></pclass->
                    
                    <?php $__currentLoopData = Session::get('doc_msg'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="doc col-12">
                            <h5>Patient Name : <?php $name = DB::select('select * from patient where pat_id = ?',[$doc->pat_id]);
                            echo $name[0]->pat_fname . ' ' . $name[0]->pat_lname; ?> </h5>
                            <p class="lead"> <?php echo e($doc->message); ?> </p>
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

<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\3rd training\HIS_Project_Kovido\resources\views/admin/admin_doc_msg.blade.php ENDPATH**/ ?>