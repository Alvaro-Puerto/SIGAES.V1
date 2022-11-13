<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Event;
use App\Models\Pensum;
use App\Models\PensumMatter;
use App\Models\SchoolYear;
use Carbon\Carbon;
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
        $events = Event::with('users')->where('course_id', $course_id)->where('school_year_id', $school_year_id)->get();
        return response()->json($events);
    }

    public function create(Request $request) {
       
        $pensum = Pensum::find($request->pensum_id);
        $list = implode(', ', $request->freq);
        $list = '[ '. $list . ' ]';
        $event = new Event();
        $event->title = $request->title . '-' . $pensum->course->name;
        $event->daysOfWeek = $list;
        $event->backgroundColor = $request->color;
        $event->school_year_id = $pensum->school_year_id;
        $event->course_id = $pensum->course_id;
        $event->startTime = Carbon::parse($request->dtstart)->format('H:i');
        $event->endTime = Carbon::parse($request->until)->format('H:i');
        $event->startRecur = Carbon::parse($request->dtstart)->format('Y-m-d');
        $event->endRecur = Carbon::parse($request->until)->format('Y-m-d');
        $event->save();
        $event->users()->attach($request->user_id);

       // $event->users;
        return response()->json($event);
    }
}
