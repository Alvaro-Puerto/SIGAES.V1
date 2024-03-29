

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="container-fluid mt-7">
      <div class="row">
          <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
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
                          <a href="#"><?php echo e(__('Show more')); ?></a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-xl-8 order-xl-1">
              <div class="card bg-secondary shadow">
                  <div class="card-header">
                      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Matriculas</a>
                          </li>
                          <!--<li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Reporte disciplinario</a>
                          </li>-->
                          <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Referencia familiar-</a>
                          </li>
                      </ul>
                  </div>
                  <div class="card-body">
                      <div class="tab-content" id="pills-tabContent">
                          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="container-fluid d-flex justify-content-end">
                              <a  href="<?php echo e(route('enrollement.new', ['id'=>$student->id])); ?>" class="btn btn-primary mr-0">
                                  <span><i class="fa fa-plus text-white" aria-hidden="true"></i></span>
                                  Nueva matricula
                              </a>
                            </div>
                              <div class="table-responsive mt-4">
                                  <table class="table align-items-center table-light table-flush">
                                    <thead class="thead-light">
                                      <tr>
                                        <th scope="col" class="sort" data-sort="name">Id</th>
                                        <th scope="col" class="sort" data-sort="budget">Año de matricula</th>
                                        <th scope="col" class="sort" data-sort="status">Grado</th>
                                        <th scope="col"  class="sort" data-sort="status">Nivel/Programa</th>
                                        <th scope="col" class="sort" data-sort="completion">Modalidad</th>
                                        <th scope="col" class="sort" data-sort="completion">Fecha de matricula</th>
                                        <th scope="col" class="sort" data-sort="completion"></th>
                                        <th scope="col" class="sort" data-sort="completion"></th>
                                      </tr>
                                    </thead>
                                    <tbody class="list" >
                                      <?php $__currentLoopData = $student->enrollement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <tr>
                                            <td><?php echo e($item->id); ?></td>
                                            <td><?php echo e($item->year->name); ?></td>  
                                            <td><?php echo e($item->course->name); ?></td>
                                            <td><?php echo e($item->level->name); ?></td>
                                            <td><?php echo e($item->modality->name); ?></td>
                                            <td><?php echo e($item->created_at); ?></td>
                                            <td>
                                              <a href="<?php echo e(route('enrollement.detail', ['id' => $item->id])); ?>" class="btn btn-success">
                                               
                                                Detalles
                                                <span>
                                                  <i class="fa fa-arrow-right text-sucess" aria-hidden="true"></i>
                                                </span>
                                              </a>
                                              <a class="btn btn-link" href="<?php echo e(route('enrollement.matter', $item->id)); ?>">
                                                <span> <i class="fas fa-pencil-alt text-primary"></i></span>
                                                Editar 
                                                
                                              </a>
                                             
                                            </td>
                                            <td> 
                                              <form class="dropdown-item ml-0 pl-0 pt-2" action="<?php echo e(route('enrollement.delete', $item->id)); ?>" method="post">
                                              <?php echo csrf_field(); ?>
                                              <?php echo method_field('DELETE'); ?>
                                              <button class="btn btn-link  text-dark" type="submit">
                                                <span><i class="fa fa-times text-danger" aria-hidden="true"></i></span>
                                                 Eliminar
                                              </button>
                                            </form></td>
                                          </tr>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      
                                    </tbody>
                                  </table>
                                </div>
                          </div>
                          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                              <div class="table-responsive">
                                  <table class="table align-items-center table-dark table-flush">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th scope="col" class="sort" data-sort="name">Project</th>
                                        <th scope="col" class="sort" data-sort="budget">Budget</th>
                                        <th scope="col" class="sort" data-sort="status">Status</th>
                                        <th scope="col">Users</th>
                                        <th scope="col" class="sort" data-sort="completion">Completion</th>
                                        <th scope="col"></th>
                                      </tr>
                                    </thead>
                                    <tbody class="list">
                                      <tr>
                                        <th scope="row">
                                          <div class="media align-items-center">
                                            <a href="#" class="avatar rounded-circle mr-3">
                                              <img alt="Image placeholder" src="../assets/img/theme/bootstrap.jpg">
                                            </a>
                                            <div class="media-body">
                                              <span class="name mb-0 text-sm">Argon Design System</span>
                                            </div>
                                          </div>
                                        </th>
                                        <td class="budget">
                                          $2500 USD
                                        </td>
                                        <td>
                                          <span class="badge badge-dot mr-4">
                                            <i class="bg-warning"></i>
                                            <span class="status">pending</span>
                                          </span>
                                        </td>
                                        <td>
                                          <div class="avatar-group">
                                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                              <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                                            </a>
                                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                              <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                                            </a>
                                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                              <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                                            </a>
                                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                              <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                                            </a>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex align-items-center">
                                            <span class="completion mr-2">60%</span>
                                            <div>
                                              <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                              </div>
                                            </div>
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
                                      <tr>
                                        <th scope="row">
                                          <div class="media align-items-center">
                                            <a href="#" class="avatar rounded-circle mr-3">
                                              <img alt="Image placeholder" src="../assets/img/theme/angular.jpg">
                                            </a>
                                            <div class="media-body">
                                              <span class="name mb-0 text-sm">Angular Now UI Kit PRO</span>
                                            </div>
                                          </div>
                                        </th>
                                        <td class="budget">
                                          $1800 USD
                                        </td>
                                        <td>
                                          <span class="badge badge-dot mr-4">
                                            <i class="bg-success"></i>
                                            <span class="status">completed</span>
                                          </span>
                                        </td>
                                        <td>
                                          <div class="avatar-group">
                                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                              <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                                            </a>
                                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                              <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                                            </a>
                                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                              <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                                            </a>
                                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                              <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                                            </a>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex align-items-center">
                                            <span class="completion mr-2">100%</span>
                                            <div>
                                              <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                              </div>
                                            </div>
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
                                      <tr>
                                        <th scope="row">
                                          <div class="media align-items-center">
                                            <a href="#" class="avatar rounded-circle mr-3">
                                              <img alt="Image placeholder" src="../assets/img/theme/sketch.jpg">
                                            </a>
                                            <div class="media-body">
                                              <span class="name mb-0 text-sm">Black Dashboard</span>
                                            </div>
                                          </div>
                                        </th>
                                        <td class="budget">
                                          $3150 USD
                                        </td>
                                        <td>
                                          <span class="badge badge-dot mr-4">
                                            <i class="bg-danger"></i>
                                            <span class="status">delayed</span>
                                          </span>
                                        </td>
                                        <td>
                                          <div class="avatar-group">
                                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                              <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                                            </a>
                                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                              <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                                            </a>
                                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                              <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                                            </a>
                                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                              <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                                            </a>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex align-items-center">
                                            <span class="completion mr-2">72%</span>
                                            <div>
                                              <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                                              </div>
                                            </div>
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
                                      <tr>
                                        <th scope="row">
                                          <div class="media align-items-center">
                                            <a href="#" class="avatar rounded-circle mr-3">
                                              <img alt="Image placeholder" src="../assets/img/theme/react.jpg">
                                            </a>
                                            <div class="media-body">
                                              <span class="name mb-0 text-sm">React Material Dashboard</span>
                                            </div>
                                          </div>
                                        </th>
                                        <td class="budget">
                                          $4400 USD
                                        </td>
                                        <td>
                                          <span class="badge badge-dot mr-4">
                                            <i class="bg-info"></i>
                                            <span class="status">on schedule</span>
                                          </span>
                                        </td>
                                        <td>
                                          <div class="avatar-group">
                                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                              <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                                            </a>
                                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                              <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                                            </a>
                                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                              <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                                            </a>
                                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                              <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                                            </a>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex align-items-center">
                                            <span class="completion mr-2">90%</span>
                                            <div>
                                              <div class="progress">
                                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                              </div>
                                            </div>
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
                                      <tr>
                                        <th scope="row">
                                          <div class="media align-items-center">
                                            <a href="#" class="avatar rounded-circle mr-3">
                                              <img alt="Image placeholder" src="../assets/img/theme/vue.jpg">
                                            </a>
                                            <div class="media-body">
                                              <span class="name mb-0 text-sm">Vue Paper UI Kit PRO</span>
                                            </div>
                                          </div>
                                        </th>
                                        <td class="budget">
                                          $2200 USD
                                        </td>
                                        <td>
                                          <span class="badge badge-dot mr-4">
                                            <i class="bg-success"></i>
                                            <span class="status">completed</span>
                                          </span>
                                        </td>
                                        <td>
                                          <div class="avatar-group">
                                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                              <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                                            </a>
                                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                              <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                                            </a>
                                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                              <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                                            </a>
                                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                              <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                                            </a>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex align-items-center">
                                            <span class="completion mr-2">100%</span>
                                            <div>
                                              <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                              </div>
                                            </div>
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
                                    </tbody>
                                  </table>
                                </div>
                          </div>
                          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="card">
                              <div class="card-header d-flex justify-content-end">
                                <a href="<?php echo e(route('tutor.select', ["id" => $student->id])); ?>" class="btn btn-primary">
                                  <span>
                                    <i class="fa fa-plus text-white" aria-hidden="true"></i>
                                  </span>
                                  Añadir tutor
                                </a>
                              </div>
                              <div class="card-body">
                                <div class="card-deck">
                                  <?php $__currentLoopData = $student->tutor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tutor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <div class="card">
                                    <div class="card-header">
                                        <p class="text-dark font-weight-bold">
                                            Informacion del tutor
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <small class="d-block">Cedula de identidad.</small>
                                        <p class=""><?php echo e($tutor->user->dni); ?></p>
                                        <small class="d-block">Nombres completos.</small>
                                        <p class=""><?php echo e($tutor->user->fullName()); ?></p>
                                        <small class="d-block">Email.</small>
                                        <p class=""><?php echo e($tutor->user->email); ?></p>
                                        <small class="d-block">Fecha de nacimiento</small>
                                        <p class=""><?php echo e($tutor->user->birth_date); ?></p>
                                        <small class="d-block">Sexo</small>
                                        <p class=""><?php echo e($tutor->user->gender); ?></p>
                                    </div>
                                    <div class="card-footer">
                                      <form action="<?php echo e(route('tutor.detach', ["id_student" => $student->id, "id_tutor" => $tutor->id])); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-danger" type="submit">
                                          <span>
                                            <i class="fa fa-times text-white" aria-hidden="true"></i>
                                          </span>
                                          Quitar vinculo
                                        </button>
                                      </form>
                                      
                                    </div>
                                  </div>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                  </div>
                  
                
              </div>
                  
              </div>
          </div>
      </div>
  </div>

<?php $__env->stopSection(); ?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cambiar foto de perfil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data" action="<?php echo e(url('student/update/photo')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <input type="number" value=<?php echo e($student->id); ?> class="custom-file-input" hidden name="id" >
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="file" >
                        <label class="custom-file-label" for="customFile">Selecciona la nueva foto</label>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-end">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit"  class="btn btn-primary">Actualizar</button>   
                </div>
            </form>
        </div>
        
      </div>
    </div>
  </div>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alvar\Documents\SIGAES.V1\resources\views/student_detail.blade.php ENDPATH**/ ?>