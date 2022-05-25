<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
    <style>
        
    </style>
</head>
<body>
<form action="http://127.0.0.1:8000/submit-new-passord-api" method="post">
    <?php echo csrf_field(); ?>
    <div>
        <input name="email" value="<?php echo e($email); ?>">
    </div>
    <div>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password">
    </div>

    <input type="submit" value="submit">
</form>
</body>
</html>
<?php /**PATH C:\Users\progr\Downloads\HIS_Project_Kovido\resources\views/reset_passpword_api.blade.php ENDPATH**/ ?>