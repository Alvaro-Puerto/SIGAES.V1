<?php

namespace App\Http\Controllers;

use App\Models\Modality;
use Illuminate\Http\Request;

class ModalityController extends Controller
{
    //
    public function get() {
        return view('modality_list', ['modalities' => Modality::paginate(15)]);
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required'
        ], [
            'name.required' => 'El nombre es requerido',
            'description.required' => 'La descripcion es requerido',
        ]);
        
        Modality::updateOrCreate(
            ['id' => $request->id],
            $request->all()
        );

        return redirect('school/modality');
    }

    public function delete($id) {
        Modality::find($id)->delete();

        return redirect('school/modality');
    }

    public function update($id) {
        $modality = Modality::find($id);
        return view('modality_update', ['modality' => $modality]);
    }
}
