<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

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
        error_log($student);
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
        error_log($student);
        return view('student_detail')->with(['student' => $student]);
    }
}
