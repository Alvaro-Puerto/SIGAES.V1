<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $student = Student::all();

        foreach($student as $user) {
            $user->user;
        }
      
        return view('list_student', ['students' => $student]);
    }

    public function create(Request $request) {
        $data = $request->all();
        $data['password'] = bcrypt('secret');
        $data['name'] = $request->first_name . ' ' . $request->last_name;
        $user = User::create($data);
        $user->student()->create($data);
        return redirect('/student');
    }

    public function detail($id) {
        $student = Student::find($id);
        $student->user;
        $student->enrollement;
        
        error_log($student);
        return view('student_detail')->with(['student' => $student]);
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
}
