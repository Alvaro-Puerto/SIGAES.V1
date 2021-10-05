

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-fluid  mt-2">
   <div class="card mt-2">
        <div class="card-header">
            <p class="font-weight-bold">
              <span>
                <a href="<?php echo e(route('year.list')); ?>">
                  <i class="fa fa-arrow-left text-success" aria-hidden="true"></i>
                </a>
              </span>
              Configuración del curso
            </p>
            <div class="row">
              <div class="col-3">
                <small >Nombre del ciclo</small>
                <p class="font-weight-bold"><?php echo e($year->name); ?></p>
              </div>
              <div class="col-3">
                <small >Descripción del ciclo</small>
                <p class="font-weight-bold"><?php echo e($year->description); ?></p>
              </div>
              <div class="col-3">
                <small >Fecha inicio del ciclo</small>
                <p class="font-weight-bold"><?php echo e($year->start_at); ?></p>
              </div>
              <div class="col-3">
                <small>Fecha fin del ciclo</small>
                <p class="font-weight-bold"><?php echo e($year->end_at); ?></p>
              </div>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <a href="<?php echo e(route('semester.new', ['id'=>$year->id])); ?>" class="btn btn-primary mb-2" >
                    <span class="">
                        <i class="fa fa-plus text-white" aria-hidden="true"></i>
                    </span>
                     Añadir semetres
                </a>
            </div>
            <table class="table align-items-center table-flush" id="table-student">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Id</th>
                    <th scope="col" class="sort" data-sort="budget">Nombre del semestre</th>
                    <th scope="col" class="sort" data-sort="status">Inicia </th>
                    <th scope="col" class="sort" data-sort="status">Termina</th>
                    <th scope="col" class="sort" data-sort="status">Fecha de creación</th>
                
                    <th scope="col" class="sort" data-sort="status">Acciones</th>
                  </tr>
                </thead>
                <tbody class="list" id="tbody-student">
                <?php $__currentLoopData = $year->semester; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <th scope="row">
                      <?php echo e($semester->id); ?>

                    </th>
                    <th scope="row">
                      <?php echo e($semester->name); ?>

                    </th>
                    <th scope="row">
                      <?php echo e($semester->start_at); ?>

                    </th>
                    <th scope="row">
                      <?php echo e($semester->end_at); ?>

                    </th>
                    <th scope="row">
                      <?php echo e($semester->created_at); ?>

                    </th>
                   
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v text-primary"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="<?php echo e(route('semester.partial.list', ['id'=>$semester->id])); ?>"  >
                            <span><i class="fa fa-cogs text-success" aria-hidden="true"></i></span>
                            Configurar parciales
                          </a>
                          <a class="dropdown-item" href="<?php echo e(route('semester.update', ['id'=>$semester->id])); ?>">
                            <span><i class="fas fa-pencil-alt textr-primary"></i></span>
                            Editar
                          </a>
                          <form class="dropdown-item" action="<?php echo e(route('semester.delete', $semester->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-link m-0 p-0 text-dark" type="submit">
                              <span><i class="fa fa-times text-danger" aria-hidden="true"></i></span>
                               Eliminar
                            </button>
                          </form>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alvar\Documents\SIGAES.V1\resources\views/school_year_config.blade.php ENDPATH**/ ?>