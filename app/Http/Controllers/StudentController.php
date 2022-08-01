<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Http\Traits\UserTrait;
use App\Models\Student;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    use UserTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $student = Student::orderBy('created_at')->paginate(10);

        foreach($student as $user) {
            $user->user;
        }
      
        return view('list_student', ['students' => $student]);
    }

    public function create(Request $request) {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'birth_date' => 'required',
            'gender' => 'required',
            'code' => 'required|unique:students',
            
        ], [
            'first_name.required' => 'El primer nombre es requerido',
            'last_name.required' => 'El apellido es requerido',
            'email.required' => 'El correo electronico es requerido',
            'email.unique' => 'Ya existe un correo electronico',
            'gender.required' => 'El sexo es requerido',
            'code.required' => 'El codigo es requerido',
            'general_observation.required' => 'Por favor ingresar una observacion',
            'birth_date.required' => 'La fecha de nacimiento es requerida',
            'code.unique' => 'El codigo del estudiante ya existe. Por favor validar.'
        ]);

        $data = $request->all();
        $data['password'] = bcrypt('secret');
        $data['name'] = $request->first_name . ' ' . $request->last_name;
        $user = User::create($data);
        $student = $user->student()->create($data);
        
        if($request->file) {
            $path = $request->file('file')->store('student_picture');
            $user->picture = $path;
        }
        
        $user->save();

        return redirect('/student');
    }

    public function detail($id) {
        $student = Student::find($id);
        $student->user;
        $student->enrollement;
        
        error_log($student);
        return view('student_detail')->with(['student' => $student]);
    }

    public function config() {
        return view('student_config');
    }

    public function updatePhoto(Request $request) {
        $user = Student::find($request->id)->user;
       
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $path = $request->file('file')->store('student_picture');
        $user->picture = $path;
        $user->save();
        
        return back($status = 302);
    
    }

    public function export() {
        return Excel::download(new StudentExport, 'users.xlsx');

    }

    public function search(Request $request) {
        if($request->ajax) {
            
        }
    }

    public function update($id) {

        $student = Student::find($id);
        return view('student_update', ['student' => $student]);
    }

    public function put(Request $request) {
        $student = Student::find($request->id);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'code' => 'required',
           
        ], [
            'first_name.required' => 'El primer nombre es requerido',
            'last_name.required' => 'El apellido es requerido',
            'email.required' => 'El correo electronico es requerido',
            'email.unique' => 'Ya existe un correo electronico',
            'gender.required' => 'El sexo es requerido',
            'code.required' => 'El codigo es requerido',
            
            'birth_date.required' => 'La fecha de nacimiento es requerida',
           
        ]);

        $student->code = $request->code;
        $student->general_observation = $request->general_observation;
        $student->save();

        $user = $student->user;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->birth_date = $request->birth_date;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->save();
        return Response()->redirectTo('/student');

        
    }
}
