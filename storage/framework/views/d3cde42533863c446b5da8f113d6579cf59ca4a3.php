

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-fluid mt--6 ">
    <div class="card mt--6">
        <div class="card-header">
            <p class="font-weight-bold">Nuevo semestre</p>
            <?php if($errors->any()): ?>
        
            <div class="card-header">
                <div class="alert alert-danger" role="alert">
                    <?php echo e($errors->first()); ?>

                </div>
            </div>
        <?php endif; ?>
        </div>
        <div class="card-body">
            <form  method="post" action="<?php echo e(url('school/semester/new')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for= ""></label>
                    <input type="text" name="school_year_id" class="form-control " id="school_year_id" hidden value="<?php echo e($semester->school_year_id); ?>" >
                    </div>
                    <div class="form-group col-12">
                        <label for= "">Id</label>
                        <input type="text" name="id" class="form-control " id="id" value="<?php echo e($semester->id); ?>" readonly >
                    </div>
                    <div class="form-group col-12">
                        <label for= "">Nombre del semestre</label>
                        <input type="text" name="name" class="form-control " id="name" required value="<?php echo e($semester->name); ?>">
                    </div>
                    <div class="form-group col-12">
                        <label for= "">Descripción del semestre</label>
                        <input type="text" name="description" class="form-control " id="description" required value="<?php echo e($semester->description); ?>">
                    </div>
                    <div class="form-group col-6">
                        <label for= "">Fecha inicio del semestre</label>
                        <input type="date" name="start_at" class="form-control " id="start_at" required value="<?php echo e($semester->start_at); ?>">
                    </div>
                    <div class="form-group col-6">
                        <label for= "">Fecha fin del semestre</label>
                        <input type="date" name="end_at" class="form-control " id="end_at" required value="<?php echo e($semester->end_at); ?>">
                    </div>
                    <div class="form-group col-12 d-flex justify-content-end">
                        <a  href="<?php echo e(route('year.config', ['id'=>$semester->school_year_id ])); ?>" class="btn btn-danger">Cancelar</a>
                        <button class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alvar\Documents\SIGAES.V1\resources\views/semester_update.blade.php ENDPATH**/ ?>