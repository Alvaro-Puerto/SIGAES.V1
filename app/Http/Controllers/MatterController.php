<?php

namespace App\Http\Controllers;

use App\Exports\MatterExport;
use App\Models\Matter;
use App\Models\SchoolInformation;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MatterController extends Controller
{
    //
    public $school;

    public function __construct()
    {
        $this->school = SchoolInformation::offset(0)->limit(1)->first(); //Para obtener el colegio
    }

    public function create(Request $request) {
        $this->school->matters()->updateOrCreate(
            ["id" => $request->id] ,
            $request->all()
        );

        return redirect('matters');
    }

    public function delete($id) {
        $matter = Matter::find($id);
        $matter->delete();
        return redirect('school/matters');
    }

    public function get() {
        if($this->school) {
            $matters = $this->school->matters;
            return view('list_matter', ['matters' => $matters]);
        } else {
            return redirect('school/setting');
        }
    }

    public function detail($id) {
        $matter = Matter::find($id);
        $matter->teachers;

        foreach ($matter->teachers as $teacher) {
            $teacher->user;
        }
        return view('matter_detail', ['matter' => $matter]);
    }

    public function report() {
        return Excel::download(new  MatterExport, 'materias.xlsx');
    }
}
