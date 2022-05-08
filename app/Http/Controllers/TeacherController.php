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
        $data = $request->all();
        $data['password'] = bcrypt('secret');
        $data['name'] = $request->first_name . ' ' . $request->last_name;
        $user = User::create($data);
        $user->teacher()->create($data);
        return redirect('/teacher');
    }

    public function index() {
        $teacher = Teacher::all();

        foreach($teacher as $user) {
            $user->user;
        }
        return view('teacher-list', ['teacher' => $teacher]);
    }

    public function detail($id) {
        $teacher = Teacher::find($id);
        $teacher->user;
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
