<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    //
    public function get() {
        return view('level_list', ['levels' => Level::paginate(15)]);
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required'
        ], [
            'name.required' => 'El nombre es requerido',
            'description.required' => 'La descripcion es requerido',
        ]);
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
