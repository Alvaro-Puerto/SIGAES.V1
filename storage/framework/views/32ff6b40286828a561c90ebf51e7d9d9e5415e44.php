

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-fluid  mt--6">
    <div class="card  mt--6">
        <div class="card-header">
            <p class="font-weight-bold">
                Detalles de la asignaturas
            </p>
        </div>
        <div class="card-body">
            <div class=" justity-content-end">
                <small class="d-flex justity-content-end">Fecha de creacion</small>
                <p class="font-weight-bold d-flex justity-content-end"><?php echo e($matter->created_at); ?></p>
            </div>
            <small>Nombre de la asignatura</small>
            <p class="font-weight-bold"><?php echo e($matter->name); ?></p>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-6">
                <p class="font-weight-bold">Maestros asignados a esta materia</p>
                <a  href="<?php echo e(route('matter.teacher', ['id'=>$matter->id])); ?>" class="btn btn-primary"><span class="fa fa-plus"></span> Asignar nuevo maestro</a>
            </div>
            
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
                      <?php $__currentLoopData = $matter->teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        
                        </th>
                        <td class="budget">
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
                          <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('argon')); ?>/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo e(asset('argon')); ?>/vendor/chart.js/dist/Chart.extension.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alvar\Documents\SIGAES.V1\resources\views/matter_detail.blade.php ENDPATH**/ ?>