<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="/submit-it-not" method="post">
    <?php echo csrf_field(); ?>
    <input type="text" name="email" id="email">
    <input type="submit" value="submit">
    </form>
</body>
</html>
<?php /**PATH C:\Users\progr\Downloads\HIS_Project_Kovido\resources\views/just-form.blade.php ENDPATH**/ ?>