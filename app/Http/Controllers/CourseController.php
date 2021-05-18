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
        $data['school_information_id'] = $school->id;
        $course = Course::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        return Redirect::to('school/courses');
    }
}