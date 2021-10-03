

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="card-header">
                    <p class="font-weight-bold">
                        Detalles de la matricula
                    </p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <small class="d-block">Año lectivo</small>
                            <p class="font-weight-bold">
                                <?php echo e($enrollement->year->name); ?>

                            </p>
                        </div>
                        <div class="col-md-3">
                            <small>Grado lectivo</small>
                            <p class="font-weight-bold">
                               <?php echo e($enrollement->course->name); ?>

                            </p>
                        </div>
                        <div class="col-md-3">
                            <small class="d-block">Modalidad</small>
                            <p class="font-weight-bold">
                                <?php echo e($enrollement->modality->name); ?>

                             </p>
                        </div>
                        <div class="col-md-3">
                            <small class="d-block">Turno</small>
                            <p class="font-weight-bold">
                                <?php echo e($enrollement->turn->name); ?>

                             </p>
                        </div>
                        <div class="col-md-3">
                            <small class="d-block">Tipo de ingreso</small>
                            <p class="font-weight-bold">
                                <?php echo e($enrollement->type); ?>

                            </p>
                        </div>
                        <div class="col-md-3">
                            <small class="d-block">Repitente</small>
                            <?php if($enrollement->is_repeat): ?>
                                <span class="badge badge-danger">Repitente</span>    
                            <?php else: ?>
                                <span class="badge badge-success">No es repitente</span>    
                            <?php endif; ?>                                                        
                        </div>
                        <div class="col-md-3">
                            <small class="d-block">Fecha de matricula</small>
                            <p class="font-weight-bold">
                                <?php echo e($enrollement->created_at); ?></p>                                                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row bg-white">
        <div class="col-12">
            <div class="card">
                <div class="card-body row">
                    <div class="col">

                    </div>
                    <?php $__currentLoopData = $year_school->semester; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-4">
                        <p class="font-weight-bold"><?php echo e($item->name); ?></p>
                        <div class="row">
                            <?php $__currentLoopData = $item->partials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col">
                                    <?php echo e($partial->name); ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>     
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="card-body row d-block">
                    <?php $__currentLoopData = $enrollement->matters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-12 border-bottom">
                            <p><?php echo e($item->name); ?>

                                <span>
                                    <a href="<?php echo e(route('partial.matter.update', ["id" => $item->pivot->id, 'id_enrollement' => $enrollement->id])); ?>">
                                        <i class="fas fa-external-link-square-alt text-success"></i>
                                    </a>
                                </span>
                            </p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
       
        
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alvar\Documents\SIGAES.V1\resources\views/detail_enrollement.blade.php ENDPATH**/ ?>