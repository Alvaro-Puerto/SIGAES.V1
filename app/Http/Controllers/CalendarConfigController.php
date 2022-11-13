<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Pensum;
use App\Models\SchoolYear;
use Illuminate\Http\Request;

class CalendarConfigController extends Controller
{
    //
    public function index() {
        $school_year = SchoolYear::where('status', true)->first();
        $courses = Course::all();
        return view('config_calendar', ['school_year' => $school_year, 'courses' => $courses]);
    }

    public function detail($id) {
        $school_year = SchoolYear::where('status', true)->first();
        $pensum = Pensum::where('course_id', $id)->where('school_year_id', $school_year->id)->first();
        return view('config_calendar_detail', ['pensum' => $pensum, 'id' => $id]);
    }
}
