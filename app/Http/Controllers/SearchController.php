<?php

namespace App\Http\Controllers;

use App\Models\ParentStudent;
use App\Models\SchoolInformation;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\User;
use ErrorException;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search_student(Request $request) {
        $students = Student::query();
            
        if($request->code) {
            $students->where('code', "LIKE", "%{$request->code}%");
        }

        if($request->first_name) {
            error_log('primer nombre');
            //$student->without('user')->where('first_name', "LIKE", "%{$request->first_name}%");
            $first_name = $request->first_name;
            $students->whereHas('user', function($q) use($first_name) {
                $q->where('first_name', "LIKE", "%{$first_name}%");
            });
        }

        if($request->last_name) {
            $last_name = $request->last_name;
            $students->whereHas('user', function($q) use($last_name) {
                $q->where('last_name', "LIKE", "%{$last_name}%");
            });
        }
        
      
        $output = "";
        if($students->exists()) {
            foreach ($students->get() as $student) {
                
                try {
                    $user = $student->user;
                    $user->first_name;
                } catch (ErrorException $th) {
                    $user = User::find($student->user_id);
                }

                $output.='<tr>'.
                '<td  scope="row">'.$student->id.'</td>'.
                '<td  scope="row">'.$student->code.'</td>'.
                '<td  scope="row">'.$user->first_name.'</td>'.
                '<td  scope="row">'.$user->last_name.'</td>'.
                '<td  scope="row">'.$user->phone.'</td>'.
                '<td  scope="row">'.$user->birth_date.'</td>'.
                '<td class="text-right">'.
                    '<div class="dropdown">'.
                        '<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.
                            ' <i class="fas fa-ellipsis-v text-primary"></i>'.
                        '</a>'.
                        '<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">'.
                            '<a class="dropdown-item" '. 'href="'. "student/detail/".$student->id.'">' . 'Ver detalles</a>'.
                            '<a class="dropdown-item" '. 'href="'. "student/".$student->id.'/update">' . 'Editar</a>'.
                        '</div>'.
                '</td>'.
                '</tr>';
                    // $tempo = [
                    //     "id" => $student->id,
                    //     "first_name" => $student->user->first_name,
                    //     "last_name" => $student->user->last_name,
                    //     "phone" => $student->user->phone,
                    //     "first_name" => $student->user->birth_date,
                    //     "picture" => $student->user->picture,
                        
                    // ];
                    // array_push($array, $tempo);
                    
            }

            error_log(count($students->get()));
        
            return Response($output);
    
        } else {
            $output.='<tr><td colspan="3" class="text-center" scope="row"> No se encontraron registros</td></tr>';
        }
    }

    public function search_tutor(Request $request) {
        $students = ParentStudent::query();
            
        if($request->dni) {
            $students->where('dni', "LIKE", "%{$request->code}%");
        }

        if($request->first_name) {
            $first_name = $request->first_name;
            $students->whereHas('user', function($q) use($first_name) {
                $q->where('first_name', "LIKE", "%{$first_name}%");
            });
        }

        if($request->last_name) {
            $last_name = $request->last_name;
            $students->whereHas('user', function($q) use($last_name) {
                $q->where('last_name', "LIKE", "%{$last_name}%");
            });
        }
        
      
        $output = "";
        if($students->exists()) {
            foreach ($students->get() as $student) {
                
                try {
                    $user = $student->user;
                    $user->first_name;
                } catch (ErrorException $th) {
                    $user = User::find($student->user_id);
                }

                $output.='<tr>'.
                '<td  scope="row">'.$student->id.'</td>'.
                '<td  scope="row">'.$student->code.'</td>'.
                '<td  scope="row">'.$user->first_name.'</td>'.
                '<td  scope="row">'.$user->last_name.'</td>'.
                '<td  scope="row">'.$user->phone.'</td>'.
                '<td  scope="row">'.$user->birth_date.'</td>'.
                '<td class="text-right">'.
                    '<div class="dropdown">'.
                        '<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.
                            ' <i class="fas fa-ellipsis-v text-primary"></i>'.
                        '</a>'.
                        '<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">'.
                            '<a class="dropdown-item" '. 'href="'. "student/detail/".$student->id.'">' . 'Ver detalles</a>'.
                        '</div>'.
                '</td>'.
                '</tr>';
                
                $output = '<div class="card">'.
                            '<div class="card-header">'.
                                '<p class="text-dark font-weight-bold"> Informacion del perfil</p>'.
                            '</div>'.
                            '<div class="card-body>'.
                                '<small class="d-block">Nombres completos</small>'.
                                '<p>'. $user->first_name . ' '. $user->last_name .'</p>'.
                                '<small class="d-block">Email</small>'.
                                '<p>'. $user->email . '</p>'.
                                '<small class="d-block">Cedula</small>'.
                                '<p>'. $user->dni . '</p>'.
                            '</div>'.
                            '<div class="card-footer">'.
                                '<a href='. '"'. $student->id. '/confirm"' . 'class="btn btn-success"> Seleccionar</a>'.
                            '</div>';
            }

            return Response($output);
    
        } else {
            $output.='<tr><td colspan="3" class="text-center" scope="row"> No se encontraron registros</td></tr>';
        }
    }
}