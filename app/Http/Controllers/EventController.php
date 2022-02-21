<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Event;
use App\Models\SchoolYear;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index() {
        $courses = Course::all();
        $school_years = SchoolYear::all();
        $context = [
            'courses' => $courses,
            'school_years' => $school_years
        ];
        return view('calendar', $context);
    }

    public function getEventByAjax($course_id, $school_year_id) {
        $events = Event::where('course_id', $course_id)->where('school_year_id', $school_year_id)->get();
        return response()->json($events);
    }
}
