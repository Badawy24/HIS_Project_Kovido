<?php $__env->startSection('content'); ?>
<h2>Here, you can add a petient</h2>
<form>
  <fieldset>
    <legend>Feedback form</legend>
    <div>
      <label for="fname">First name: </label>
      <input id="fname" name="fname" type="text" required>
    </div>
    <div>
      <label for="lname">Last name: </label>
      <input id="lname" name="lname" type="text" required>
    </div>
    <div>
      <label for="email">Email address (include if you want a response): </label>
      <input id="email" name="email" type="email">
    </div>
    <div><button>Submit</button></div>
  </fieldset>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-dashbord-temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\third_year_training\HIS_Project_Kovido\resources\views/admin/admin_add_patient.blade.php ENDPATH**/ ?>