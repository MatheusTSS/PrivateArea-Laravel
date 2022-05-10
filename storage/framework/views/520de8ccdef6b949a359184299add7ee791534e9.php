<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Private Area</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/bootstrap/bootstrap.min.css')); ?>">
    <script src="<?php echo e(asset('assets/jquery.min.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('assets/fontawesome/font-awesome.min.css')); ?>">
</head>
<body>
    <?php echo $__env->make('usebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('conteudo'); ?>
    <script src="<?php echo e(asset('assets/bootstrap/bootstrap.bundle.min.js')); ?>"></script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\privatearea\resources\views/layouts/app_layout.blade.php ENDPATH**/ ?>