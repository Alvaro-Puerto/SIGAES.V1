

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="container-fluid mt-2">
      <div class="row mt-2">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0 d-flex justify-content-between">
                <h3 class="mb-0">Lista de los cursos</h3>
                <a class="btn btn-primary" href=<?php echo e(url('school/courses/new', [])); ?>>
                    <span class="fa fa-plus text-white"> Añadir nuevo curso</span>
                </a>
              </div>
              <!-- Light table -->
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Id</th>
                      <th scope="col" class="sort" data-sort="budget">Nombre del curso</th>
                      <th scope="col" class="sort" data-sort="status">Capacidad</th>
                      <th scope="col" class="sort" data-sort="status">Fecha de creación</th>
                      <th scope="col" class="sort" data-sort="status">Acciones</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <th scope="row">
                        <?php echo e($course->id); ?>

                      </th>
                      <th scope="row">
                        <?php echo e($course->name); ?>

                      </th>
                      <th scope="row">
                        <?php echo e($course->capacity); ?>

                      </th>
                      <th scope="row">
                        <?php echo e($course->created_at); ?>

                      </th>
                      <td class="text-cemter">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            
                            <a class="dropdown-item" href="<?php echo e(route('school.course.update', ['id'=>$course->id])); ?>">
                              <span><i class="fas fa-pencil-alt textr-primary"></i></span>
                              Editar
                            </a>
                            <form class="dropdown-item" action="<?php echo e(route('school.course.delete', $course->id)); ?>" method="post">
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
              <!-- Card footer -->
              <div class="card-footer py-4">
                <nav aria-label="...">
                  <ul class="pagination justify-content-end mb-0">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1">
                        <i class="fas fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>
                    <li class="page-item active">
                      <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">
                        <i class="fas fa-angle-right"></i>
                        <span class="sr-only">Next</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('argon')); ?>/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo e(asset('argon')); ?>/vendor/chart.js/dist/Chart.extension.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alvar\Documents\SIGAES.V1\resources\views/list_course.blade.php ENDPATH**/ ?>