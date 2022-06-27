<?php

namespace App\Http\Controllers;

use App\Exports\TeacherExport;
use App\Models\Teacher;
use App\Models\User;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    public function create(Request $request) {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'birth_date' => 'required',
            'gender' => 'required',
            'inss' => 'required',
           // 'inss' => 'required'
        ], [
            'first_name.required' => 'El primer nombre es requerido',
            'last_name.required' => 'El apellido es requerido',
            'email.required' => 'El correo electronico es requerido',
            'email.unique' => 'Ya existe un correo electronico',
            'gender.required' => 'El sexo es requerido',
            
            'inss.required' => 'El INSS es requerido',
            'birth_date.required' => 'La fecha de nacimiento es requerida',
            
        ]);
        $data = $request->all();
       
        $data['password'] = bcrypt('secret');
        $data['name'] = $request->first_name . ' ' . $request->last_name;
        $user = User::create($data);

        if($request->file) {
            $path = $request->file('file')->store('student_picture');
            $user->picture = $path;
        }
        
        $user->save();

        $user->teacher()->create($data);
        return redirect('/teacher');
    }

    public function index() {
        $teachers = Teacher::paginate(15);

        foreach($teachers as $user) {
            $user->user;
        }
        return view('teacher-list', ['teachers' => $teachers]);
    }

    public function detail($id) {
        $teacher = Teacher::find($id);
        $teacher->user;

        $pensum = $teacher->pensum;

        foreach ($pensum as $item) { 
            $item->pensum;
        }
        return view('teacher_detail')->with(['teacher' => $teacher]);
    }

    public function updatePhoto(Request $request) {
        $user = Teacher::find($request->id)->user;
       
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
      $path = $request->file('file')->store('student_picture');
      $user->picture = $path;
      $user->save();
    
      return back($status = 302);
    
    }

    public function report() {
        return Excel::download(new TeacherExport, 'teachers.xlsx');
    }

    public function search($name) {
        $username = $name;
        error_log($name);
        $teachers = Teacher::whereHas('user', function ($query) use ($username){
            $query->where('first_name', 'like', "%{$username}%");
        })->get();

        foreach ($teachers as $teacher ) {
            $teacher->user;
        }

        return response()->json($teachers);
    }

    
}
