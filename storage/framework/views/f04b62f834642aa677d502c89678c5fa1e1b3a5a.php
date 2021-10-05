

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-fluid">
    <div class="card mt-2">
        <div class="card-header">
            <p class="font-weight-bold">Nuevo turno escolar</p>
        </div>
        <div class="card-body">
            <form  method="post" action="<?php echo e(url('school/turn/new')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for= ""></label>
                        <input type="text" name="school_information_id" class="form-control " id="" hidden>
                    </div>
                    <div class="form-group col-12">
                        <label for= "">Id</label>
                        <input type="text" name="id" class="form-control " id="" readonly value="<?php echo e($turn->id); ?>">
                    </div>
                    <div class="form-group col-12">
                        <label for= "">Nombre del turno</label>
                        <input type="text" name="name" class="form-control " id="name" required value="<?php echo e($turn->name); ?>">
                    </div>
                    <div class="form-group col-12 d-flex justify-content-end">
                        <a type="button" href="<?php echo e(route('school.turns')); ?>" class="btn btn-danger">Cancelar</a>
                        <button class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alvar\Documents\SIGAES.V1\resources\views/turn_update.blade.php ENDPATH**/ ?>