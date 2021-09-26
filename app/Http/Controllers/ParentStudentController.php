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
        $parents = ParentStudent::all();
        foreach($parents as $parent) {
            $parent->user;
        }

        return view('list_parent', ['parents' => $parents]);
    }

    public function create(Request $request) {
        $data = $request->all();
        $data['password'] = bcrypt('secret');
        $data['name'] = $request->first_name . ' ' . $request->last_name;
        $user = User::create($data);
        $user->tutor()->create($data);
        return redirect('/student');
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
