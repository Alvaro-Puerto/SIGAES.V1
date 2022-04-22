<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Matter;
use App\Models\Pensum;
use App\Models\PensumMatter;
use App\Models\SchoolYear;
use App\Models\Teacher;
use Illuminate\Http\Request;

class PensumController extends Controller
{
    //
    public function detail($id) {
        $course = Course::find($id);

        return view('list_pensum', ['course' => $course]);
    }

    public function pensumCreateStep1($id) {
        $course = Course::find($id);
        $school_years = SchoolYear::all();
        return view('pensum_create_step_1', ['course' => $course, 'school_years' => $school_years]);
    }

    public function pensumCreateStep1Post(Request $request) {
        $pensum = Pensum::create($request->all());

        return redirect('course/' . $request->course_id . '/pensum/' . $pensum->id . '/matter');
    }

    public function pensumCreateStep2($id_course, $id_pensum) {
        $course = Course::find($id_course);
        $matters = Matter::all();
        $teachers = Teacher::all();
        return view('pensum_matter_asign', 
                    ['course' => $course, 
                     'matters' => $matters,
                     'teachers' => $teachers,
                     'id_pensum' => $id_pensum
                    ]);
    }
    
    public function pensumCreateStep2Post(Request $request) {
        PensumMatter::create($request->all());

        return response()->json('ok');
    }
}