<?php
use Illuminate\Support\Facades\DB;
?>

<?php $__env->startSection('content'); ?>
<div  class = "doc-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="avatar">
                    <img src="/images_dark/doc_online.png" class="img-doc img-fluid" /> 
                </div>
            </div>
            <div class="col-md-6">
                <div class="doc-content-msg">
                    <h3>Hello D/ <?php echo e($doctor[0]->doc_fname . ' ' . $doctor[0]->doc_lname); ?></h3>
                    <?php
                        $msgs = DB::select('select * from doc_pat where doc_id = ?', [$doctor[0]->doc_id]);
                        $collname = 'fluch-collapse';
                        $collapseName = array();
                        for($i = 0; $i<count($msgs); $i+=1){
                            $collapseName[$i] = $collname . $i+1;
                        }
                        $x = 0;
                    ?>
                    <p class="lead">You Have got <?php echo e(count($msgs)); ?> messages..</p>
                    <div class="msgs">
                        <div class="accordion accordion-flush" id="accordionFlushExample">

                            <?php $__currentLoopData = $msgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                            <div class="accordion-item">

                                <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target=<?php echo e("#" . $collapseName[$x]); ?> aria-expanded="false" aria-controls=<?php echo e($collapseName[$x]); ?>>
                                    <?php if($msg->reply == ''): ?>
                                        <i class="not-rp rp-icon fa-brands fa-replyd"></i>
                                    <?php else: ?>
                                    <i class="rp rp-icon fa-solid fa-circle-check"></i>
                                    <?php endif; ?>
                                    Message Number #<?php $r = $x + 1; echo $r; ?> :
                                </button>
                                </h2>
                                <div id=<?php echo e($collapseName[$x]); ?> class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <h5>Patient Name : <?php 
                                        $pat_id = $msg->pat_id;
                                        $pat_name = DB::select('select pat_fname, pat_lname from patient where pat_id = ?', [$pat_id]);
                                        ?><?php echo e($pat_name[0]->pat_fname . ' ' . $pat_name[0]->pat_lname); ?></h5>
                                    <p class="lead msg-content">
                                        <span>Message Content : </span>
                                        <?php echo e($msg->message); ?>

                                    </p>
                                    <?php if($msg->reply == ''): ?>
                                    <p class="comment">
                                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fa-solid fa-comment-dots"></i>
                                        </a>
                                    </p>
                                    <div class="collapse text-comment" id="collapseExample">
                                        <div class="card-body">
                                        <form action=<?php $act = '/saveReply'; $act.= '/' . $msg->msg_id; echo $act; ?> method="post">
                                            <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <textarea name="reply"></textarea>
                                                    <?php $__errorArgs = ['reply'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                            <i class="fa-solid fa-triangle-exclamation"></i>
                                                            <div><?php echo e($message); ?> </div>
                                                        </div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type ="submit" value="Save"/>
                                                </div>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                    <?php else: ?>
                                        <p class="lead msg-reply">
                                            <span>your Reply : </span>
                                            <?php echo e($msg->reply); ?>

                                            
                                        </p>
                                    <?php endif; ?>
                                        
                                </div>
                                </div>

                            </div>

                            <?php $x+= 1; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\3rd_p\HIS_Project_Kovido\resources\views/doc_profile.blade.php ENDPATH**/ ?>