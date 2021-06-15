@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                {{-- <img src="{{ url($teacher->user->picture) }}" alt="" title="" />
                                 --}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                        {{-- <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Cambiar foto de perfil') }}</a> --}}
                        <button type="button" class="btn btn-sm btn-info mr-4" data-toggle="modal" data-target="#exampleModal">
                            Cambiar foto de perfil
                        </button>
                        {{-- <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a> --}}
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
                           {{$teacher->user->name}}
                        </h3>
                        <h3>
                            {{$teacher->inss}}
                         </h3>
                        <div class="h5 font-weight-300">
                            {{$teacher->user->birth_date}}
                        </div>
                        <div class="h5 font-weight-300">
                            {{$teacher->user->gender}}
                        </div>
                        <div class="h5 mt-4">
                            {{$teacher->user->email}}
                        </div>
                        
                        <hr class="my-4" />
                    <p>{{$teacher->general_observation}}</p>
                        <a href="#">{{ __('Show more') }}</a>
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
                        <li class="nav-item">
                          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Reporte disciplinario</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Referencia familiar-</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                           <div class="container-fluid d-flex justify-content-end">
                            <button class="btn btn-primary ">
                                <span><i class="fa fa-plus text-white" aria-hidden="true"></i></span>
                                Nueva matricula
                            </button>
                           </div>
                            <div class="table-responsive mt-4">
                                <table class="table align-items-center table-light table-flush">
                                  <thead class="thead-light">
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
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae expedita quam tempora cum ipsam! Libero ipsum atque, voluptas aliquid officiis laborum omnis culpa nostrum neque saepe ullam. Labore, reiciendis consequatur.</div>
                      </div>
                </div>
                 
              
            </div>
                
            </div>
        </div>
    </div>
    
    @include('layouts.footers.auth')
</div>
@endsection

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
            <form method="POST" enctype="multipart/form-data" action="{{url('student/update/photo')}}">
                @csrf
                <div class="form-group">
                    <input type="number" value={{$teacher->id}} class="custom-file-input" hidden name="id" >
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="file" >
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-end">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-primary">Actualizar</button>   
                </div>
            </form>
        </div>
        
      </div>
    </div>
  </div>