

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-fluid mt-2 ">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <p class="font-weight-bold">Asignar materias por matriculas</p>
                    <a href="" class="btn btn-link">
                        <span><i class="fa fa-check text-succcess " aria-hidden="true"></i></span>  
                        Finalizar registro
                    </a>
                </div>
                <div class="card-body d-flex">
                    <div class="row " >
                        <?php $__currentLoopData = $matters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-3 card m-2">
                                <div class="">
                                    <div class="card-footer border-0 text-center">
                                        <form action="<?php echo e(route('enrollement_matter.asing')); ?>" method="post" class="m-0 p-0">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="enrollement_id" value="<?php echo e($id); ?>">
                                            <input type="hidden" name="matter_id" value="<?php echo e($item->id); ?>">
                                            <button type="submit" class="btn btn-link d-block">
                                                <span><i class="fa fa-check text-success d-block text-success" aria-hidden="true"></i></span>
                                                <?php echo e($item->name); ?>

                                            </button>    
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <p class="text-dark font-weight-bold">Materias seleccionadas</p>
                </div>
                <div class="card-body d-flex">
                    <div class="row">
                        <?php $__currentLoopData = $enrollement->matters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-3 card m-2">
                                <div class="">
                                    <div class="card-footer border-0 text-center">
                                        <form action="<?php echo e(route('enrollement_matter.detach')); ?>" method="post" class="m-0 p-0">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="enrollement_id" value="<?php echo e($id); ?>">
                                            <input type="hidden" name="matter_id" value="<?php echo e($item->id); ?>">
                                            <button type="submit" class="btn btn-link d-block">
                                                <span><i class="fa fa-times text-danger d-block text-center" aria-hidden="true"></i></span>
                                                <?php echo e($item->name); ?>

                                            </button>    
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alvar\Documents\SIGAES.V1\resources\views/enrollement_matter.blade.php ENDPATH**/ ?>