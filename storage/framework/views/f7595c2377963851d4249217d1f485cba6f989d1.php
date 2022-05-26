
<?php $__env->startSection('content'); ?>
<div class="menu">
    <div class="container">
      
        <div class ="row ">

            <div class="col-md-4">
                <img class="test_image_1" src="/images/test_menu.png" />
            </div> 
            

            <div  class="col-md-4">
                <div class="test_menu">

                    <div class = "choice-1">
                        <p>
                            To Perform a New Reservation 
                        </p>
                        <button class="btn btn-primary mb-3 submit" onclick="window.location.href = '/new_test';"> New Test </button>   
                    </div>

                    <div class = "choice-2">
                        <p>
                            To Edit an Existing Reservation  
                        </p>
                        <button class="btn btn-primary mb-3 submit" onclick="window.location.href = '/my_tests';"> My Tests </button>   
                    </div>
                    
                </div>
            </div>
            
            <div class="col-md-4">
                <img class="test_image_2" src="/images/test_menu_2.png" />
            </div>

        </div>
        
    </div>
    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Badawy\Desktop\HIS_Project_Kovido\resources\views/test_option.blade.php ENDPATH**/ ?>