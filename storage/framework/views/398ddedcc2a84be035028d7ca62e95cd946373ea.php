

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <small class="d-block">
                        Materia a calificar
                    </small>
                    <p class="font-weight-bold">
                        <?php echo e($matter->name); ?>

                    </p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between">
                            <p class="font-weight-bold text-dark">
                                Evaluaciones
                            </p>
                            <p class="font-weigth-bold">
                                Calificación
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <?php $__currentLoopData = $enrollement_matter->partials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-6 border-bottom">
                                <p><?php echo e($item->name); ?></p>
                            </div>
                            <?php if($item->pivot->value): ?>
                            <div class="col-6 border-bottom">
                                <p><?php echo e($item->pivot->value); ?></p>
                            </div>
                            <?php else: ?>
                            <div class="col-6">
                                <form action="<?php echo e(route('matter.partial.asign')); ?>"  method="POST" class="form-inline">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id_matter" value="<?php echo e($enrollement_matter->id); ?>">
                                    <input type="hidden" name="id_partial" value="<?php echo e($item->id); ?>">
                                    <input type="number" class="form-control rounded-0 " name="value">
                                    <button class="btn btn-link">Confirmar</button>
                                    
                                </form>
                            </div>
                            
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card card-profile shadow">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <?php if($student->user->picture): ?>
                            <a href="#">
                              <img src="<?php echo e(url($student->user->picture)); ?>" alt="" title="" />
                            </a>      
                            <?php else: ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                        
                        <button type="button" class="btn btn-sm btn-info mr-4" data-toggle="modal" data-target="#exampleModal">
                            Cambiar foto de perfil
                        </button>
                        
                    </div>
                </div>
                <div class="card-body pt-0 pt-md-4">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                              
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h3>
                          <?php echo e($student->user->name); ?>

                        </h3>
                        <h3>
                            <?php echo e($student->code); ?>

                        </h3>
                        <div class="h5 font-weight-300">
                            <?php echo e($student->user->birth_date); ?>

                        </div>
                        <div class="h5 font-weight-300">
                            <?php echo e($student->user->gender); ?>

                        </div>
                        <div class="h5 mt-4">
                            <?php echo e($student->user->email); ?>

                        </div>
                        
                        <hr class="my-4" />
                    <p><?php echo e($student->general_observation); ?></p>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alvar\Documents\SIGAES.V1\resources\views/partial_matter_form.blade.php ENDPATH**/ ?>