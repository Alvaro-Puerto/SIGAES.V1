

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-fluid">
    <div class="card mt-2">
        <div class="card-header">
            <p class="font-weight-bold">Nuevo año lectivo</p>
        </div>
        <?php if($errors->any()): ?>
        
            <div class="card-header">
                <div class="alert alert-danger" role="alert">
                    <?php echo e($errors->first()); ?>

                </div>
            </div>
        <?php endif; ?>
        
        <div class="card-body">
            <form  method="post" action="<?php echo e(url('school/year/new')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for= ""></label>
                        <input type="text" name="school_information_id" class="form-control " value="<?php echo e($year->school_information_id); ?>" id="" hidden>
                    </div>
                    <div class="form-group col-12">
                        
                        <input type="number" name="id" class="form-control " id="id"  value="<?php echo e($year->id); ?>" hidden >
                    </div>
                    <div class="form-group col-12">
                        <label for= "">Nombre del año lectivo</label>
                        <input type="text" name="name" class="form-control " id="name" value="<?php echo e($year->name); ?>" >
                    </div>
                    <div class="form-group col-12">
                        <label for= "">Descripción del año lectivo</label>
                        <input type="text" name="description" class="form-control " id="description" value="<?php echo e($year->description); ?>" >
                    </div>
                    <div class="form-group col-6">
                        <label for= "">Fecha inicio del plan vigente</label>
                        <input type="date" name="start_at" class="form-control " id="start_at" value="<?php echo e($year->start_at); ?>" >
                    </div>
                    <div class="form-group col-6">
                        <label for= "">Fecha fin del plan vigente</label>
                        <input type="date" name="end_at" class="form-control " id="end_at" value="<?php echo e($year->end_at); ?>" >
                    </div>
                    <div class="form-group col-12 d-flex justify-content-end">
                        <a class="btn btn-danger" href="<?php echo e(route('year.list')); ?>">Cancelar</a>
                        <button class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alvar\Documents\SIGAES.V1\resources\views/school_year_update.blade.php ENDPATH**/ ?>