<?php

namespace App\Http\Controllers;

use App\Exports\EnrollementExport;
use App\Factory\Clases\StudentClass;
use App\Models\Course;
use App\Models\Enrollement;
use App\Models\EnrollementMatter;
use App\Models\Level;
use App\Models\Matter;
use App\Models\Modality;
use App\Models\Pensum;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\Turn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;


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
     
        $enrollement = Enrollement::create($request->all());

        return redirect()->route('enrollement.matter', ["id" => $enrollement->id]);
    }

    public function getAllMatter($id) {
        $enrollement = Enrollement::find($id);
        $pensum = Pensum::where('course_id', $enrollement->course_id)->where('school_year_id', $enrollement->school_year_id)->first();        
        
        foreach ($pensum->matter as $item) {
            EnrollementMatter::create(
                [
                    'enrollement_id' => $enrollement->id,
                    'matter_id' => $item->matter_id,
                    'pensum_id' => $pensum->id
                ]
                );
        }


        //return view('enrollement_matter', ["matters" => $matters, "id" => $id, "enrollement" => $enrollement]);
    }

    public function detail($id) {
        $student = new StudentClass($id);
        $data = $student->getData();
        
        return view('detail_enrollement', $data);
    }


    public function print($id) {
        $student = new StudentClass($id);
        $data = $student->getData();
        //view()->share($data);
       // $pdf = Pdf::loadView('enrollement_print');
       // return $pdf->download('matricula.pdf');
        return view('enrollement_print', $data);
    }

    public function delete($id) {
        $enrollement = Enrollement::find($id);
        $enrollement->delete();

        return Redirect::back();
    }
}
