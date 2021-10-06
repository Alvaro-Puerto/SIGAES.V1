

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-md-4 card">
            <div class="card-header">
                <p class="font-weight-bold">Asignatura</p>
            </div>
            <div class="card-body">
                <small>Nombre de la asignatura</small>
            <p class="font-weight-bold"><?php echo e($matter->name); ?></p>
            </div>
        </div>
        <div class="col-md-8 card">
            <div class="card-header">
                <p class="font-weight-bold">Maestros a asignar</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col" class="sort" data-sort="name">Id</th>
                          <th scope="col" class="sort" data-sort="budget">Nombres</th>
                          <th scope="col" class="sort" data-sort="status">Apellidos</th>
                          <th scope="col">Email</th>
                          <th scope="col" class="sort" data-sort="completion">Telefono</th>
                          <th scope="col">Acciones</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                          <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            
                             
                            </th>
                            <td>
                                <?php echo e($teacher->id); ?>

                            </td>
                            <td class="budget">
                              <?php echo e($teacher->user->first_name); ?>

                            </td>
                            <td>
                              <span class="badge badge-dot mr-4">
                                <?php echo e($teacher->user->last_name); ?>

                              </span>
                            </td>
                            <td>
                                <?php echo e($teacher->user->email); ?>

                            </td>
                            <td>
                              <div class="d-flex align-items-center">
                                <?php echo e($teacher->user->phone); ?>

                              </div>
                            </td>
                            <td class="text-right">
                                <form  action="<?php echo e(url('matter/teacher/assign')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <input type="number" name="matterId" id="matterId" value="<?php echo e($matter->id); ?>" hidden>
                                    <input type="number" name="teacherId" id="teacherId" value="<?php echo e($teacher->id); ?>" hidden>
                                    <button class="btn btn-success" type="submit">Asignar materia</button>
                                </form>
                               
                            </td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alvar\Documents\SIGAES.V1\resources\views/asign_matter_teacher.blade.php ENDPATH**/ ?>