<?php

namespace App\Http\Controllers;

use App\Models\Partial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PartialController extends Controller
{
    //
    public function create(Request $request) {
        $data = $request->all();
        Partial::create($data);

        return redirect()->route('semester.partial.list', ['id' => $request->semester_id]);
    }
}
