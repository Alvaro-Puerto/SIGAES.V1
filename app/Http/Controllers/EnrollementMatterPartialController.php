<?php

namespace App\Http\Controllers;

use App\Models\EnrollementMatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EnrollementMatterPartialController extends Controller
{
    //
    public function asignCalification(Request $request) {
       $partial =  EnrollementMatter::find($request->id_matter)->partials()->wherePivot('partial_id', $request->id_partial)->first();
       $partial->pivot->value = $request->value;
       $semester = $partial->semester;
       $partial->pivot->save();
       $count = 0;
        foreach($semester->partial as $partial) {
            
            if($partial->format == 'Promediado') {

            } else {
                $count = $count + 1;
            }
        }
       return Redirect::back();
    }
}
