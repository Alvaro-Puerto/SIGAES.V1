<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light " id="sidenav-main" >
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        
        <h1 class="nav-link font-weight-bold">SIGAES</h1>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="<?php echo e(asset('argon')); ?>/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo e(route('logout')); ?>" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span><?php echo e(__('Cerrar sesión')); ?></span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="<?php echo e(route('home')); ?>">
                            <img src="<?php echo e(asset('argon')); ?>/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="<?php echo e(__('Search')); ?>" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples-1" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples-1">
                        <i class="fas fa-users"></i>
                        <span class="nav-link-text" style="color: #f4645f;" ><?php echo e(__('Alumnos')); ?></span>
                    </a>
                    <div class="collapse " id="navbar-examples-1">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('student.list')); ?>">
                                    <?php echo e(__('Listado de alumnos')); ?>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('student.create')); ?>">
                                    <?php echo e(__('Nuevos alumnos')); ?>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('user.index')); ?>">
                                    <?php echo e(__('Informes')); ?>

                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples-2" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples-2">
                        <i class="fab fa-laravel" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;"><?php echo e(__('Maestros')); ?></span>
                    </a>

                    <div class="collapse " id="navbar-examples-2">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('teacher.all')); ?>">
                                    <?php echo e(__('Listado de maestros')); ?>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('teacher/new', [])); ?>">
                                    <?php echo e(__('Añadir maestro')); ?>

                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples-3">
                        <i class="fab fa-laravel" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;"><?php echo e(__('Configuración del centro')); ?></span>
                    </a>

                    <div class="collapse " id="navbar-examples-3">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('school.setting')); ?>">
                                    <?php echo e(__('Configuraciones generales del centro')); ?>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('level.list')); ?>">
                                    <?php echo e(__('Nivel/Programa')); ?>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('modality.list')); ?>">
                                    <?php echo e(__('Modalidad')); ?>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('school.courses')); ?>">
                                    <?php echo e(__('Grados')); ?>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('school.turns')); ?>">
                                    <?php echo e(__('Turnos')); ?>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('matter.list')); ?>">
                                    <?php echo e(__('Asignaturas')); ?>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('user.index')); ?>">
                                    <?php echo e(__('Permisos y accesos')); ?>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('user.index')); ?>">
                                    <?php echo e(__('')); ?>

                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples-10" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples-10">
                        <i class="fas fa-users"></i>
                        <span class="nav-link-text" style="color: #f4645f;" ><?php echo e(__('Padres de familia')); ?></span>
                    </a>
                    <div class="collapse " id="navbar-examples-10">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('tutor.list')); ?>">
                                    <?php echo e(__('Listado de tutores')); ?>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('tutor.create')); ?>">
                                    <?php echo e(__('Nuevo tutor')); ?>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('user.index')); ?>">
                                    <?php echo e(__('Informes')); ?>

                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples-5" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples-5">
                        <i class="fab fa-laravel" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;"><?php echo e(__('Curso lectivo')); ?></span>
                    </a>
                    <div class="collapse " id="navbar-examples-5">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('year.list')); ?>">
                                    <?php echo e(__('Año lectivo')); ?>

                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('user.index')); ?>">
                                    <?php echo e(__('Horarios')); ?>

                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Documentation</h6>
            <!-- Navigation -->
            
        </div>
    </div>
</nav>
<?php /**PATH C:\Users\alvar\Documents\SIGAES.V1\resources\views/layouts/navbars/sidebar.blade.php ENDPATH**/ ?>