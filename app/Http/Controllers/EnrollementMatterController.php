<?php

namespace App\Http\Controllers;

use App\Models\Enrollement;
use App\Models\EnrollementMatter;
use Illuminate\Http\Request;

class EnrollementMatterController extends Controller
{
    //
    public function attachMatter(Request $request) {
        $enrollement = Enrollement::find($request->enrollement_id);
        $year = $enrollement->year;
        
        $enrollement->matters()->attach($request->matter_id);
        
        $matter_attach = EnrollementMatter::where('enrollement_id', $enrollement->id)->where('matter_id', $request->matter_id)->first();
        error_log($matter_attach);
        foreach($year->semester as $semester) {
            $partials = $semester->partials;
            foreach($partials as $partial) {
                $matter_attach->partials()->attach($partial->id);
            }
        }
        return redirect()->route('enrollement.matter', ["id" => $enrollement->id]);

    }

    public function detachMatter(Request $request) {
        $enrollement = Enrollement::find($request->enrollement_id);

        $enrollement->matters()->detach($request->matter_id);

        return redirect()->route('enrollement.matter', ["id" => $enrollement->id]);
    }
}
