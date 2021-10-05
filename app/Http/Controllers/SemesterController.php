<?php

namespace App\Http\Controllers;

use App\Models\SchoolInformation;
use App\Models\SchoolYear;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SemesterController extends Controller
{
    //
    public $school;

    public function __construct()
    {
        $this->school = SchoolInformation::offset(0)->limit(1)->first(); //Para obtener el colegio
    }

    public function create(Request $request) {
        $school_year = SchoolYear::find($request->school_year_id);
        if($request->start_at > $request->end_at) {
            return Redirect::back()->withErrors(['msg' => 'Las fecha de inicio es mayor que la fecha fin']);    
        }
        if($school_year->start_at > $request->start_at) {
            return Redirect::back()->withErrors(['msg' => 'Las fecha de inicio de semestre es menor que la fecha del inicio del año lectivo']);    
        }
        if($school_year->end_at < $request->end_at) {
            return Redirect::back()->withErrors(['msg' => 'Las fecha de fin de semestre es mayor que la fecha fin del año lectivo']);    
        }
        if($school_year->semester()->whereDate('end_at','>=', $request->start_at)->exists()) {
            return Redirect::back()->withErrors(
                ['msg' => 'Las fecha de inicio de este semestre con valor de '.
                          $request->start_at . ' esta dentro del periodo de validez de otro semestre'
                ]
            );    
        }
        
        Semester::updateOrCreate(
            ["id" => $request->id] ,
            $request->all()
        );

        return redirect('/school/year/detail/'. $request->school_year_id);
    }

    public function delete($id) {
        $matter = Semester::find($id);
        $matter->delete();
        return Redirect::back();
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

    public function update($id) {
        $semester = Semester::find($id);

        return view('semester_update', ['semester' => $semester]);
    }
}
