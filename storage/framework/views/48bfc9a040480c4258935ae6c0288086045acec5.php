

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid mt-2">
        
      <div class="card p-4">
        <form  method="POST" enctype="multipart/form-data" action="<?php echo e(url('school/create')); ?>" >
            <?php echo csrf_field(); ?>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="">Id</label>
                    <input type="text" class="form-control" name="id" id="id" value="<?php echo e($school->id); ?>" disabled>
                </div>
                <div class="form-group col-6">
                    <label for="">Nombre del centro</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo e($school->name); ?>">
                </div>
                <div class="form-group col-6">
                    <label for="">Codigo unico del establecimiento</label>
                <input type="text" class="form-control" name="code" id="code"  value="<?php echo e($school->code); ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="">Dirección del centro</label>
                <input type="text" class="form-control" name="address" id="address"  value="<?php echo e($school->address); ?>">
                </div>
                <div class="form-group col-6">
                    <label for="">Ciudad</label>
                <input type="text" class="form-control" name="city" id="city" value="<?php echo e($school->city); ?>">
                </div>
                <div class="form-group col-6">
                    <label for="">Municipio</label>
                <input type="text" class="form-control" name="municipality" id="municipality" value="<?php echo e($school->municipality); ?>">
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="file" >
                        <label class="custom-file-label" for="customFile">Selecciona el la insignia del centro</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 d-flex justify-content-end">
                    <button class="btn btn-danger">Cancelar</button>
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </div>
  
          </form>
      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('argon')); ?>/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo e(asset('argon')); ?>/vendor/chart.js/dist/Chart.extension.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alvar\Documents\SIGAES.V1\resources\views/school_information.blade.php ENDPATH**/ ?>