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

            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'start_at' => 'required|before:end_at',
                'end_at' => 'required|after:start_date'
            ],
            [
                'name.required' => 'El nombre es requerido',
                'description.required' => 'La descripcion es requerida',
                'start_at.required' => 'La fecha de inicio es requerida',
                'end_at.required' => 'La fecha de finalizacion es requerida',
                'end_at.after' => 'La fecha de finalizacion es invalida',
                'start_at.before' => 'La fecha de inicio es invalida'
            ]);

            $this->school->years()->updateOrCreate(
                ["id" => $request->id] ,
                $request->all()
            );
        } else {
            return redirect('error/information/school/not_found');
        }
        

        return redirect('school/year');
    }

    public function delete($id) {
        $matter = SchoolYear::find($id);
        $matter->delete();
        return Redirect::back();
    }

    public function get() {
        if($this->school) {
            $years = $this->school->years()->paginate(15);
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

    public function update($id) {
        $year = SchoolYear::find($id);
        return view('school_year_update', ['year' => $year]);
    }
}
