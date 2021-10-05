<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    //
    public function get() {
        return view('level_list', ['levels' => Level::all()]);
    }

    public function store(Request $request) {
        Level::updateOrCreate(
            ['id' => $request->id],
            $request->all() 
        );

        return redirect('school/level');
    }

    public function delete($id) {
        Level::find($id)->delete();

        return redirect('school/level');
    }

    public function update($id) {
        $level = Level::find($id);
        return view('level_update', ['level' => $level]);
    }
}
