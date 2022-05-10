<?php $__env->startSection('conteudo'); ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-4 offset-sm-4">

                
                <form action="<?php echo e(route('login_submit')); ?>" method="post">

                    
                    <?php echo csrf_field(); ?>

                    <h4>LOGIN</h4>
                    <hr>
                    <div class="form group">
                        <label> Usuário :</label>
                        <input type="email" name="text_usuario" class="form-control">
                    </div>

                    <div class="form group">
                        <label> Senha : </label>
                        <input type="password" name="text_senha" class="form-control">
                    </div>

                    <hr>
                    <div class="form-group">
                        <input type="submit" value="Entrar" class="btn btn-primary">
                    </div>

                </form>
                

                
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                
                <?php if(isset($erro)): ?>
                    <?php $__currentLoopData = $erro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mensagem_erro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="alert alert-danger text-center"><?php echo e($mensagem_erro); ?>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\privatearea\resources\views/login.blade.php ENDPATH**/ ?>