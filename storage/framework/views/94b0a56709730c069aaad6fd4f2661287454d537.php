

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <p class="font-weight-bold">Nueva matricula</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route ('enrollement.create')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="">Nivel/Programa 
                                    <span class="text-danger">*
                                        <a  href="<?php echo e(route('level.list')); ?>" target="_blank" rel="noopener noreferrer">
                                            <span><i class="fa fa-plus text-success ml-2 " aria-hidden="true"></i></span>
                                        </a>
                                    </span>
                                </label>
                                <select class="form-control rounded-0" name="level_id" id="level_id">
                                    <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value=<?php echo e($level->id); ?>><?php echo e($level->name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="">Modalidad 
                                    <span class="text-danger">*
                                        <a  href="<?php echo e(route('modality.list')); ?>" target="_blank" rel="noopener noreferrer">
                                            <span><i class="fa fa-plus text-success ml-2 " aria-hidden="true"></i></span>
                                        </a>
                                    </span>
                                </label>
                                <select class="form-control rounded-0" name="modality_id" id="modality_id">
                                    <?php $__currentLoopData = $modalities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value=<?php echo e($modality->id); ?>><?php echo e($modality->name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="">Turno 
                                    <span class="text-danger">*
                                        <a  href="<?php echo e(route('school.turns.new')); ?>" target="_blank" rel="noopener noreferrer">
                                            <span><i class="fa fa-plus text-success ml-2 " aria-hidden="true"></i></span>
                                        </a>
                                    </span>
                                </label>
                                <select class="form-control rounded-0" name="turn_id" id="turn_id">
                                    <?php $__currentLoopData = $turns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($turn->id); ?>><?php echo e($turn->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="">Tipo de matricula <span class="text-danger">*</span></label>
                                <select class="form-control rounded-0" name="type" id="type">
                                    <option value="Estudiante activo">Estudiante activo</option>
                                    <option value="Nuevo Ingreso">Nuevo Ingreso</option>
                                    <option value="Traslado de colegio">Traslado de colegio</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="">Grado/Ciclo
                                    <span class="text-danger">*
                                        <a  href="<?php echo e(route('school.courses.new')); ?>" target="_blank" rel="noopener noreferrer">
                                            <span><i class="fa fa-plus text-success ml-2 " aria-hidden="true"></i></span>
                                        </a>
                                    </span>
                                </label>
                                <select class="form-control" id="course_id" name="course_id">
                                    <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($grade->id); ?>><?php echo e($grade->name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="">Año lectivo
                                    <span class="text-danger">*
                                        <a  href="<?php echo e(route('school.year.new')); ?>" target="_blank" rel="noopener noreferrer">
                                            <span><i class="fa fa-plus text-success ml-2 " aria-hidden="true"></i></span>
                                        </a>
                                    </span>
                                </label>
                                <select class="form-control" id="school_year_id" name="school_year_id">
                                    <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($year->id); ?>><?php echo e($year->name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="" class="d-block">El estudiante es repitente <span class="text-danger">*</span></label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" onclick="isRepeat()" name="is_repeat" id="repeat" value="1">
                                    <label class="form-check-label" for="inlineRadio1">Si</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" onclick="resetForm()" name="is_repeat" id="inlineRadio2" value="0" checked>
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                              
                            </div>
                        </div>
                        <div class="form-row" id="container-repeat">
                            <div class="form-group col-4">
                                <label for="">Cuantas veces</label>
                                <input type="number" class="form-control rounded-0 border" min="1" id="count_repeat" name="count_repeat">
                            </div>
                            <div class="col-8 form-group">
                                <label for="">Escribe el motivo</label>
                                <textarea class="rounded-0 border form-control " id="reason" name="reason_repeat"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="">Observaciones especiales o notas</label>
                                <textarea class="rounded-0 border " name="general_observation" style="width: 100%; height: 150px" ></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="student_id" value=<?php echo e($id); ?>>
                        <div class="form-row d-flex justify-content-end mt-4">
                            <a  href="<?php echo e(route('student.detail', ['id'=>$id])); ?>"  class="btn btn-danger">Cancelar</a>
                            <button class="btn btn-success">Crear matricula</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
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
                        <a href="#"><?php echo e(__('Show more')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<?php $__env->stopSection(); ?>


<script type="text/javascript" src="<?php echo e(asset('assets/js/enrollement_validation.js')); ?>"></script>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alvar\Documents\SIGAES.V1\resources\views/enrollement.blade.php ENDPATH**/ ?>