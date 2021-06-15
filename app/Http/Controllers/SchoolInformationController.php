<?php

namespace App\Http\Controllers;

use App\Models\SchoolInformation;
use Illuminate\Http\Request;

class SchoolInformationController extends Controller
{
    //
    public function index() {
        $school = SchoolInformation::offset(0)->limit(1)->first();
        if(!$school) {
            $school = new SchoolInformation();
            return view('school_information', ['school' => $school]);
        }
        return view('school_information', ['school' => $school]);
    }

    public function create(Request $request) {
        $data = $request->all();
        if(!$request->id) {
            $data['id'] = 1;
        }
        SchoolInformation::updateOrCreate(
            ['id' => $data['id']],
            $data
        );
        return redirect('school/setting');
    }
}
