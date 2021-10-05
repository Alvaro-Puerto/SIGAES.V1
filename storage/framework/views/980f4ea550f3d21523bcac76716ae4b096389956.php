

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid mt-2">
       <div class="card">
           <div class="card-body">
            <form method="POST" action="<?php echo e(url('school/level')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="">
                        Nombre del programa/nivel
                    </label>
                    <input class="form-control rounded-0 border" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="">
                        Descripción del programa/nivel
                    </label>
                    <input class="form-control rounded-0 border" name="description" id="description">
                </div>
                <div class="form-group d-flex justify-content-end">
                    <a type="button" class="btn btn-danger" href="<?php echo e(route('level.list')); ?>">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
               
            </form>
           </div>
       </div>
  
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alvar\Documents\SIGAES.V1\resources\views/level_new.blade.php ENDPATH**/ ?>