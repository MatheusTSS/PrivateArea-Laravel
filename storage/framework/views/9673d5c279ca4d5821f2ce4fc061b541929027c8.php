<div class="container-fluid bg-dark text-white">
    <div class="row">
        <div class="col-6 p-3">[PRIVATE AREA]</div>
        <div class="col-6 text-end p-3"><?php echo e(session('usuario')['usuario']); ?> | <a href="<?php echo e(route('logout')); ?>">Sair</a></div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\privatearea\resources\views/usebar.blade.php ENDPATH**/ ?>