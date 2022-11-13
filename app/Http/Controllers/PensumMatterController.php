<?php

namespace App\Http\Controllers;

use App\Models\Pensum;
use App\Models\PensumMatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PensumMatterController extends Controller
{
    //
    public function detach(Request $request) {
        $pensum = Pensum::find($request->pensum_id);
        $pensum->matter()->where('matter_id', $request->matter_id)->delete();

        return Redirect::back();
    }

    public function detachTeacher(Request $request) {
        $pensumMatter = PensumMatter::find($request->matter_pensum_id);
        $pensumMatter->teachers()->detach($request->teacher_id);

        return Redirect::back();
    }

    public function detail($id) {
        $pensumMatter = PensumMatter::find($id);
        $teachers = $pensumMatter->teachers;

        $data = [];

        foreach ($teachers as $teacher) {
            array_push($data, $teacher->user);
        }

        return response()->json($data);
    }
}
