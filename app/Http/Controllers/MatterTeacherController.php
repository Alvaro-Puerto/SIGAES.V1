<?php

namespace App\Http\Controllers;

use App\Models\Matter;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MatterTeacherController extends Controller
{
    //
    public function get($id) {
        $matter = Matter::find($id);
        $teachers = $matter->teachers;
        $keys = [];
        foreach ($teachers as $teacher) {
            array_push($keys, $teacher->id);
        }
        $teachers = Teacher::all()->except($keys);
        $data = [
            "matter" => $matter,
            "teachers" => $teachers
        ];
        return view('asign_matter_teacher', $data);
    }

    public function attach(Request $request) {
        $matter = Matter::find($request->matterId);
        $matter->teachers()->attach($request->teacherId);

        return Redirect::back();
    }

    public function dettach($matterId, $teacherId) {
        $matter = Matter::find($matterId);
        $matter->teachers()->detach($teacherId);

        return Redirect::back();
    }

}
