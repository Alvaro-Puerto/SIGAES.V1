<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\SchoolInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    //
    public function index() {
        $school = SchoolInformation::offset(0)->limit(1)->first();
        if(!$school) {
            return Redirect::to('school/setting')->withErrors('message' ,'Se necesita configurar');
        }
        $courses = $school->course;
        error_log($courses);
        return view('list_course', ['course' => $courses]);
    }

    public function create(Request $request) {
        $school = SchoolInformation::offset(0)->limit(1)->first();


        $data = $request->all();

        $request->validate([
            'name' => 'required',
            'capacity' => 'required'
        ], [
            'name.required' => 'El nombre es requerido',
            'capacity.required' => 'La capacidad es requeridad',
            'capacity.min' => 'La capacidad minima es de 15 estudiantes',
            'capacity.max' => 'La capacidad maxima es de 60 estudiantes',
        ]);

        if(!$school) {
            return redirect('error/information/school/not_found');
        }
        
        $data['school_information_id'] = $school->id;
        $course = Course::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        return Redirect::to('school/courses');
    }

    public function delete($id) {
        Course::find($id)->delete();
        return Redirect::to('school/courses');
    }

    public function update($id) {
        $course = Course::find($id);
        return view('course_update', ['course' => $course]);
    }
}
