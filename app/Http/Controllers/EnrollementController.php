<?php

namespace App\Http\Controllers;

use App\Exports\EnrollementExport;
use App\Models\Course;
use App\Models\Enrollement;
use App\Models\EnrollementMatter;
use App\Models\Level;
use App\Models\Matter;
use App\Models\Modality;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\Turn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class EnrollementController extends Controller
{
    //

    public function report() {
        return Excel::download(new EnrollementExport, 'matriculas.xlsx');
    }

    public function get($id) {
        $student = Student::find($id);
        $student->user;

        $turns = Turn::all();
        $grades = Course::all();
        $levels = Level::all();
        $years = SchoolYear::all();
        $modalities = Modality::all();
        $data = [
            "student" => $student,
            "turns" => $turns,
            "grades" => $grades,
            "levels" => $levels,
            "modalities" => $modalities,
            "years" => $years,
            "id" => $id
        ];

        return view('enrollement', $data);
    }

    public function create(Request $request) {
        /* $flat =Enrollement::where('student_id', $request->student_id)->where('school_year_id', $request->school_year_id)->first();
        if($flat) {
            return redirect('student/detail/'. 4);
        } */
        $enrollement = Enrollement::create($request->all());

        return redirect()->route('enrollement.matter', ["id" => $enrollement->id]);
    }

    public function getAllMatter($id) {
        $enrollement = Enrollement::find($id);
        $matter_asign = $enrollement->matters;
        $array_id = [];

        foreach($matter_asign as $matter) {
            array_push($array_id, $matter->id);
            error_log($matter->id);
        }
        $matters = Matter::whereNotIn('id', $array_id)->get();
        return view('enrollement_matter', ["matters" => $matters, "id" => $id, "enrollement" => $enrollement]);
    }

    public function detail($id) {
        $enrollement = Enrollement::find($id);
        $year_school = $enrollement->year;
        $enrollement_matter = $enrollement->matters;
        $tempo = [];
        
        foreach($enrollement_matter as $matter) {
            $tempo_partial = [];
            $enrollement_partial = EnrollementMatter::find($matter->pivot->id);
          
            foreach($enrollement_partial->partials as $partial) {
                array_push($tempo_partial, $partial);
            }
            $data = [
                'id_pivot' => $matter->pivot->id,
                'id_matter' => $matter->id,
                'name_matter' => $matter->name,
                'partials' => $tempo_partial
            ];
            $data = (object) $data;
            
            array_push($tempo, $data);
        }

        $data = [
                    'enrollement' => $enrollement, 
                    "year_school" => $year_school,
                    'matter_and_partial' => $tempo
                ];
        return view('detail_enrollement', $data);
    }

    public function delete($id) {
        $enrollement = Enrollement::find($id);
        $enrollement->delete();

        return Redirect::back();
    }
}
