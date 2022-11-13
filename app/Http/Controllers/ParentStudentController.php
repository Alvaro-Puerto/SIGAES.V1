<?php

namespace App\Http\Controllers;

use App\Models\ParentStudent;
use App\Models\Student;
use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class ParentStudentController extends Controller
{
    //

    public function get() {
        $parents = ParentStudent::paginate(15);
        foreach($parents as $parent) {
            $parent->user;
        }

        return view('list_parent', ['parents' => $parents]);
    }

    public function create(Request $request) {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'birth_date' => 'required',
            'gender' => 'required',
            'phone' => 'required'
            
        ], [
            'phone.required' => 'El telefono es requerido',
            'first_name.required' => 'El primer nombre es requerido',
            'last_name.required' => 'El apellido es requerido',
            'email.required' => 'El correo electronico es requerido',
            'email.unique' => 'Ya existe un correo electronico',
            'gender.required' => 'El sexo es requerido',
            'code.required' => 'El codigo es requerido',
            'general_observation.required' => 'Por favor ingresar una observacion',
            'birth_date.required' => 'La fecha de nacimiento es requerida',
            
        ]);
 
        $data = $request->all();
        $data['password'] = bcrypt('secret');
        $data['name'] = $request->first_name . ' ' . $request->last_name;
        $user = User::create($data);
        $user->tutor()->create($data);
        return redirect('/tutor/list');
    }

    public function put(Request $request) {
        $parent = ParentStudent::find($request->id);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'phone' => 'required'
            //'code' => 'required',
           
        ], [
            'first_name.required' => 'El primer nombre es requerido',
            'last_name.required' => 'El apellido es requerido',
            'email.required' => 'El correo electronico es requerido',
            'email.unique' => 'Ya existe un correo electronico',
            'gender.required' => 'El sexo es requerido',
            //'code.required' => 'El codigo es requerido',
            
            'birth_date.required' => 'La fecha de nacimiento es requerida',
           
        ]);

        //$student->code = $request->code;
        //$student->general_observation = $request->general_observation;
        //$student->save();

        $user = $parent->user;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->birth_date = $request->birth_date;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->save();
        return Response()->redirectTo('/tutor/list');

    }

    public function delete($id) {
        ParentStudent::find($id)->delete();
    }

    public function getPreview($id_student, $id_tutor) {
        $student = Student::find($id_student);
        $tutor = ParentStudent::find($id_tutor);

        $student->user;
        $tutor->user;
        $data = [
            "student" => $student,
            "tutor" => $tutor
        ];

        return view('tutor_match', $data);
    }

    public function asignStudent(Request $request) {
        $parent = ParentStudent::find($request->id_tutor);
        $parent->student()->attach($request->id_student);
        return redirect('/student/detail/'. $request->id_student);
    }

    public function removeStudent($id_tutor, $id_student) {
        $parent = ParentStudent::find($id_tutor);
        $parent->student()->detach($id_student);
        return redirect('/student/detail/'. $id_student);
    }
}
