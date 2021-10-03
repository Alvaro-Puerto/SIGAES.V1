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
       $partial->pivot->save();

       return Redirect::back();
    }
}
