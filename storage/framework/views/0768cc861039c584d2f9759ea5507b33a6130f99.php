

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-fluid mt-2 ">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header  d-flex justify-content-between">
                    
                    <p class="font-weight-bold">
                        <?php echo e($semester->name); ?>

                    </p>
                    <a class="btn btn-link" href="<?php echo e(route('year.config', ["id" => $semester->school_year_id])); ?>"><span><i class="fa fa-arrow-left text-danger" aria-hidden="true"></i></span>Regresar</a>
                </div>
                <div class="card-body">
                    <div class="row p-0 m-0">
                        <div class="col-3">
                            <small class="d-block">
                                Inicio del semestre
                            </small>
                            <p><?php echo e($semester->start_at); ?></p>
                        </div>
                        <div class="col-3">
                            <small class="d-block">
                                Fin del semestre
                            </small>
                            <p><?php echo e($semester->end_at); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <p class="font-weight-bold">Lista de parciales por <span class="text-success"><?php echo e($semester->name); ?></span></p>
                    <a href="<?php echo e(route('semester.partial.new', ["id" => $semester->id])); ?>" class="btn btn-success">
                        <span><i class="fa fa-plus text-white" aria-hidden="true"></i></span>
                        Añadir nuevo parcial
                    </a>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <?php $__currentLoopData = $semester->partials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-2 border border-black text-center">
                                <small class="d-block">Nombre </small>
                                <p class="text-dark font-weight-bold pt-2"><?php echo e($item->name); ?></p>

                                <p class="mt-2">Max: <?php echo e($item->value); ?></p>
                            </div>    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alvar\Documents\SIGAES.V1\resources\views/semester_partial_list.blade.php ENDPATH**/ ?>