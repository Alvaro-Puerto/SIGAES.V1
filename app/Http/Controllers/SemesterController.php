<?php

namespace App\Http\Controllers;

use App\Models\SchoolInformation;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    //
    public $school;

    public function __construct()
    {
        $this->school = SchoolInformation::offset(0)->limit(1)->first(); //Para obtener el colegio
    }

    public function create(Request $request) {
       Semester::updateOrCreate(
            ["id" => $request->id] ,
            $request->all()
        );

        return redirect('school/year');
    }

    public function delete($id) {
        $matter = Semester::find($id);
        $matter->delete();
        return redirect('school/matters');
    }

    public function get() {
        if($this->school) {
            $years = $this->school->years;
            return view('school_year_list', ['years' => $years]);
        } else {
            return redirect('school/setting');
        }
    }

    public function detail($id) {
        $year = SchoolYear::find($id);
        // $year->teachers;

        return view('school_year_config', ['year' => $year]);
    }
}
