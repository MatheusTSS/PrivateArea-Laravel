<?php
use App\Classes\Enc;
$enc = new Enc();
?>

<?php $__env->startSection('conteudo'); ?>
    <div>
        <h3>LISTA DE USUÁRIOS</h3>

        <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a href="<?php echo e(route('edit', ['id_usuario' => $enc->encriptar($user->id)])); ?>">EDITAR</a> -
                <?php echo e($user->usuario); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <hr>
        <div>
            <h3>UPLOAD de Ficheiro</h3>
            <br>
            <form action="<?php echo e(route('upload')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="file" name="ficheiro">
                <input type="submit" value="Enviar">
            </form>
        </div>
        
        <?php if($errors->any()): ?>
            <div>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <hr>
        <p>SMS TOKEN: <strong><?php echo e($smstoken); ?></strong></p>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\privatearea\resources\views/home.blade.php ENDPATH**/ ?>