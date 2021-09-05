<?php

namespace App\Http\Controllers;

use App\Models\Modality;
use Illuminate\Http\Request;

class ModalityController extends Controller
{
    //
    public function get() {
        return view('modality_list', ['modalities' => Modality::all()]);
    }

    public function store(Request $request) {
        Modality::create($request->all());

        return redirect('school/modality');
    }

    public function delete($id) {
        Modality::find($id)->delete();

        return redirect('school/modality');
    }
}
