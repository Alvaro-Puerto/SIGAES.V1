<?php

namespace App\Http\Controllers;

use App\Models\Partial;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PartialController extends Controller
{
    //
    public function create(Request $request) {
        $semester = Semester::find($request->semester_id);
        $request->validate([
            'name' => 'required',
            'start_at' => 'required|before:end_at|after_or_equal:'.$semester->start_at,
            'end_at' => 'required|after:start_at|before_or_equal:'.$semester->end_at
        ], [
            'name.required' => 'Este campo es requerido',
            'start_at.required' => 'Este campo es requerido',
            'end_at.required' => 'Este campo es requerido',
            'start_at.before' => 'La fecha de inicio es invalida',
            'start_at.after_or_equal' => 'La fecha de inicio esta fuera del rango del semestre',
            'end_at.before' => 'La fecha de finalizacion es invalida',
            'end_at.before_or_equal' => 'La fecha de finalizacion esta fuera del rango del semestre',
        ]);
        $data = $request->all();
      

        if($request->start_at > $request->end_at) {
            return redirect()->back()->withErrors(['msg' => 'La fecha de inicio es mayor que la fecha limite']);
        }
        if($semester->start_at > $request->start_at) {
            return redirect()->back()->withErrors(['msg' => 'La fecha de inicio para ingreso de notas esta fuera del limite de vigencia de este semestre']);
        }
        if($semester->end_at < $request->end_at) {
            return redirect()->back()->withErrors(['msg' => 'La fecha limite  para ingreso de notas esta fuera del limite de vigencia de este semestre']);
        }
        $flat = $semester->partials()->where('end_at', '>=', $request->start_at)->where('partials.id' , '!=', $request->id)->first();
        /*
        if($flat) {
            return redirect()->back()->withErrors(
                ['msg' => 
                        'La fecha '. $request->start_at . ' - ' .$request->end_at. 
                         ' esta dentro del rango del '. 
                        $flat->name .  ' ( '. $flat->start_at . ' - '. $flat->end_at.
                        ' por favor ingrese una fecha fuera del rango o ajuste a '.
                        $flat->name . ' para obtener el resultado deseado'
                    ]);
        }
        */
        Partial::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        return redirect()->route('semester.partial.list', ['id' => $request->semester_id]);
    }

    public function delete($id) {
        Partial::find($id)->delete();

        return Redirect::back();
    }

    public function update($id) {
        $partial = Partial::find($id);
        return view('partial_update', ['partial' => $partial, 'semester' => $partial->semester]);
    }
}
