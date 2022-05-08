<?php

namespace App\Http\Controllers;

use App\Models\SchoolInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        #$request->validate([
        #    'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        #]);
    
        #$path = $request->file('file')->store('storage');
        #$url = Storage::url($path);
        #$data['logo'] = $path;

        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $path = $request->file('file')->store('student_picture');
        $path;
        $data['logo'] = $path;
        
        SchoolInformation::updateOrCreate(
            ['id' => $data['id']],
            $data
        );
       
      
        //return back($status = 302);
        return redirect('school/setting');
    }
}
