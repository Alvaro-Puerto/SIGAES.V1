

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-fluid">
    <div class="card mt-2">
        <div class="card-header">
            <p class="font-weight-bold">Nuevo curso</p>
        </div>
        <div class="card-body">
            <form  method="post" action="<?php echo e(route('school.course.new')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for= ""></label>
                        <input type="text" name="school_information_id" class="form-control " id="" hidden value="<?php echo e($course->school_information_id); ?>">
                    </div>
                    <div class="form-group col-12">
                        <input type="hidden" name="id" id="id" value="<?php echo e($course->id); ?>">
                    </div>
                    <div class="form-group col-6">
                        <label for= "">Nombre del curso</label>
                        <input type="text" name="name" class="form-control " id="name" required value="<?php echo e($course->name); ?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="">Capacidad</label>
                        <input type="number" name="capacity" class="form-control" id="capacity" required value="<?php echo e($course->capacity); ?>">
                    </div>
                    <div class="form-group col-12 d-flex justify-content-end">
                        <a class="btn btn-danger"  href="<?php echo e(route('school.courses')); ?>">Cancelar</a>
                        <button class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alvar\Documents\SIGAES.V1\resources\views/course_update.blade.php ENDPATH**/ ?>