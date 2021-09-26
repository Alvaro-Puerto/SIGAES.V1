<?php

namespace App\Http\Controllers;

use App\Models\SchoolInformation;
use App\Models\SchoolYear;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SchoolYearController extends Controller
{
    public $school;

    public function __construct()
    {
        $this->school = SchoolInformation::offset(0)->limit(1)->first(); //Para obtener el colegio
    }

    public function create(Request $request) {
        if($this->school) {
            try {
                $this->school->years()->updateOrCreate(
                    ["id" => $request->id] ,
                    $request->all()
                );
            } catch (QueryException $th) {
                return Redirect::back()->withErrors(['msg' => 'Completa los datos por favor']);
            }
        } else {
            return redirect('error/information/school/not_found');
        }
        

        return redirect('school/year');
    }

    public function delete($id) {
        $matter = SchoolYear::find($id);
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
        $year->semesters;
        return view('school_year_config', ['year' => $year]);
    }
}
