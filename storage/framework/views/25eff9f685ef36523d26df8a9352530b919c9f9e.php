

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <p class="font-weight-bold">
                    Nuevo tutor
                </p>
            </div>
            <div class="card-body">
            <form method="POST" action="<?php echo e(url('tutor/new')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                            <label for="example-text-input" class="form-control-label">Nombres </label>
                            <input class="form-control" type="text" value="" id="first_name" name="first_name" >
                        </div>
                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                            <label for="example-search-input" class="form-control-label">Apellidos</label>
                            <input class="form-control" type="text" value="" id="last_name" name="last_name">
                        </div>
                        <div class="form-group col-md-12 col-lg-12 col-xs-12">
                            <label for="example-search-input" class="form-control-label">Email</label>
                            <input class="form-control" type="text" value="" id="email" name="email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                            <label for="example-text-input" class="form-control-label">Sexo </label>
                            <select  class="form-control " id="genre" name="gender">
                                <option value="Masculino">Masculino</option>
                                <option value="Masculino">Femenino</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                            <label for="example-search-input" class="form-control-label">Telefono</label>
                            <input class="form-control" type="text" value="" id="phone" name="phone">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                            <label for="example-text-input" class="form-control-label">Fecha de nacimiento </label>
                            <input class="form-control" type="date" id="birth_date" name="birth_date">

                        </div>
                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                            <label for="example-search-input" class="form-control-label">Cedula <span class="font-weight-bold text-danger">* Requerido</span></label>
                            <input class="form-control" type="text" value="" id="code" name="code">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 form-group ">
                            <label for="example-search-input" class="form-control-label">Descripción general <span class="font-weight-bold text-danger">* Requerido</span></label>
                            <textarea class="form-control border" id="general_observation" name="general_observation"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 form-group d-flex justify-content-end">
                            <button class="btn btn-danger">Cancelar</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                    
                   
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alvar\Documents\SIGAES.V1\resources\views/new_parent.blade.php ENDPATH**/ ?>