

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <p class="font-weight-bold">Nuevo parcial</p>
                       
                    </div>
                    <?php if($errors->any()): ?>
                        <div class="card-header">
                            <div class="alert alert-danger" role="alert">
                                <?php echo e($errors->first()); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <form action="<?php echo e(route('semester.partial.create')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="semester_id" value="<?php echo e($id); ?>">
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="">Nombre del parcial</label>
                                    <input type="text" name="name" class="form-control rounded-0" id="" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Valor maximo a alcanzar</label>
                                    <input type="number" name="value" class="form-control rounded-0" id="" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Formato</label>
                                    <select class="form-control rounded-0" name="format" id="format" required>
                                        <option value="Ingresado">Valor ingresado</option>
                                        <option value="Promediado">Valor promediado</option>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Fecha minima de ingreso</label>
                                    <input type="date" name="start_at" class="form-control rounded-0" id="" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Fecha limite de ingreso</label>
                                    <input type="date" name="end_at" class="form-control rounded-0" id="" required>
                                </div>
                            </div>
                            <div class="form-row d-flex justify-content-end">
                                <a href="<?php echo e(route('semester.partial.list', ["id" => $id])); ?>" class="btn btn-danger">
                                    Cancelar
                                </a>
                                <button type="submit" class="btn btn-success">Guardar registro</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <small class="d-block">
                            Nombre del semestre
                        </small>
                        <p class="font-weight-bold">
                            <?php echo e($semester->name); ?>

                        </p>
                        <small class="d-block">
                            Fecha inicio vigente
                        </small>
                        <p class="font-weight-bold">
                            <?php echo e($semester->start_at); ?>

                        </p>
                        <small class="d-block">
                            Fecha fin vigente
                        </small>
                        <p class="font-weight-bold">
                            <?php echo e($semester->end_at); ?>

                        </p>
                    </div>
                    <div class="card-body">
                        <small class="d-block">
                            Ciclo lectivo
                        </small>
                        <p class="font-weight-bold">
                            <?php echo e($semester->year->name); ?>

                        </p>
                        <small class="d-block">
                            Fecha inicio vigente
                        </small>
                        <p class="font-weight-bold">
                            <?php echo e($semester->year->start_at); ?>

                        </p>
                        <small class="d-block">
                            Fecha fin vigente
                        </small>
                        <p class="font-weight-bold">
                            <?php echo e($semester->year->end_at); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alvar\Documents\SIGAES.V1\resources\views/new_partial.blade.php ENDPATH**/ ?>