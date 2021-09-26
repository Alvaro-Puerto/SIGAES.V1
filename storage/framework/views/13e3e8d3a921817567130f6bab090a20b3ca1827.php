

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="container-fluid mt-2">
      <div class="row mt-2">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0 ">
                <div class="row">
                  <div class="col-4">
                    <h3 class="mb-0">Lista de estudiantes</h3>
                  </div>
                  <div class="col-8 d-flex justify-content-end">
                    
                    <button class="btn btn-link mr--3" id="btn-cancel-search"  onclick="hide_or_show(), reload_app()">
                      <span>
                        <i class="fa fa-times text-danger" aria-hidden="true"></i>
                        Cancelar busqúeda
                      </span>
                    </button>
                    <button class="btn btn-link" onclick="hide_or_show()" id="btn-search">
                      <span><i class="fas fa-search text-warning"></i></span>
                    </button>
                    <a href=<?php echo e(url('student/export')); ?> class="btn btn-link"> 
                      <span><i class="fas fa-download text-success"></i></span>
                      Imprimir reporte
                    </a>
                    <a href= <?php echo e(url('student/create', [])); ?>  class="btn btn-primary"><span class="fa fa-plus"></span> Nuevo alumno</a>
                  </div>
                </div>
                
                
              </div>
              <div class="card-header" id="search-student">
                <form >
                  <meta name="_token" content="<?php echo e(csrf_token()); ?>">
                  <div class="form-row">
                    <div class="form-group col-3">
                      <label for="">Codigo</label>
                      <input class="form-control rounded-0 border" name="code" id="input-code">
                    </div>
                    <div class="form-group col-4">
                      <label for="">Nombres</label>
                      <input class="form-control rounded-0 border" name="first_name" id="input-name">
                    </div>
                    <div class="form-group col-4">
                      <label for="">Apellidos</label>
                      <input class="form-control rounded-0 border" name="last_name" id="input-last-name">
                    </div>
                    <div class="form-group col-1 pt-2">
                      <button class="btn btn-warning mt-4" type="button" onclick="get_data_form()">
                        Buscar
                      </button>
                    </div>
                  </div>
                </form>
                
              </div>
              <!-- Light table -->
              <div class="table-responsive">
                <table class="table align-items-center table-flush" id="table-student">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Id</th>
                      <th scope="col" class="sort" data-sort="budget">Codigo</th>
                      <th scope="col" class="sort" data-sort="status">Nombres</th>
                      <th scope="col" class="sort" data-sort="status">Apellidos</th>
                      <th scope="col" class="sort" data-sort="status">Telefono</th>
                      <th scope="col" class="sort" data-sort="status">Fecha de nacimiento</th>
                      <th scope="col" class="sort" data-sort="status">Acciones</th>
                    </tr>
                  </thead>
                  <tbody class="list" id="tbody-student">
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <th scope="row">
                        <?php echo e($student->id); ?>

                      </th>
                      <th scope="row">
                        <?php echo e($student->code); ?>

                      </th>
                      <th scope="row">
                        <?php echo e($student->user->first_name); ?>

                      </th>
                      <th scope="row">
                        <?php echo e($student->user->last_name); ?>

                      </th>
                      <th scope="row">
                        <?php echo e($student->user->phone); ?>

                      </th>
                      <th scope="row">
                        <?php echo e($student->user->birth_date); ?>

                      </th>

                      <td class="text-right">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v text-primary"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="<?php echo e(route('student.detail', ['id'=>$student->id])); ?>"  >Ver detalles</a>
                         
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
<script type="text/javascript" src="<?php echo e(asset('assets/js/student_validation.js')); ?>"></script>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alvar\Documents\SIGAES.V1\resources\views/list_student.blade.php ENDPATH**/ ?>