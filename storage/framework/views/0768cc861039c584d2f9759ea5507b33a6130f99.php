

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-fluid mt-2 ">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header  d-flex justify-content-between">
                    
                    <p class="font-weight-bold">
                        <span><a class="btn btn-link" href="<?php echo e(route('year.config', ["id" => $semester->school_year_id])); ?>"><span><i class="fa fa-arrow-left text-success" aria-hidden="true"></i></span></a></span>
                        <?php echo e($semester->name); ?>

                    </p>
                    
                </div>
                <div class="card-body">
                    <div class="row p-0 m-0">
                        <div class="col-3">
                            <small class="d-block">
                                Año lectivo
                            </small>
                            <p class="font-weight-bold"><?php echo e($semester->year->name); ?></p>
                        </div>
                        <div class="col-3">
                            <small class="d-block">
                                Inicio del semestre
                            </small>
                            <p class="font-weight-bold"><?php echo e($semester->start_at); ?></p>
                        </div>
                        <div class="col-3">
                            <small class="d-block">
                                Fin del semestre
                            </small>
                            <p class="font-weight-bold"><?php echo e($semester->end_at); ?></p>
                        </div>
                        <div class="col-3">
                            <small class="d-block">
                                Fecha de creación
                            </small>
                            <p class="font-weight-bold"><?php echo e($semester->created_at); ?></p>
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
                                
                                <?php if($item->format == 'Ingresado'): ?>
                                <span class="badge badge-pill badge-success">Valor ingresado</span>
                                <?php else: ?>
                                <span class="badge badge-pill badge-danger">Valor promediado</span>
                                <?php endif; ?>
                                <p class="mt-2">Max: <?php echo e($item->value); ?></p>

                                <span>
                                    <a href="<?php echo e(route('partial.update', ['id' => $item->id])); ?>" class="btn btn-link">
                                        <i class="fas fa-pencil-alt text-primary"></i>
                                    </a>
                                    <form class="dropdown-item" action="<?php echo e(route('partial.delete', $item->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-link m-0 p-0 text-dark" type="submit">
                                          <span><i class="fa fa-times text-danger" aria-hidden="true"></i></span>
                                           
                                        </button>
                                      </form>
                                   
                                </span>
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