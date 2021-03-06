<?php

namespace App\Http\Controllers;

use App\Models\SchoolInformation;
use App\Models\Turn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TurnController extends Controller
{
    //
    public $school;

    public function __construct()
    {
        $this->school = SchoolInformation::offset(0)->limit(1)->first();
    }

    public function index() {
        if($this->school) {
            $turns = $this->school->turn()->paginate(15);
            return view('list_turn', ['turns' => $turns]);
        } else {
            return redirect('school/setting');
        }
    }

    public function create(Request $request) {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'El nombre es requerido'
        ]);
        
        if($this->school) {
            $this->school->turn()->updateOrCreate(
                ['id' => $request->id],
                $request->all()
            );
        } else {
            return redirect('error/information/school/not_found');
        }
        
        return Redirect::to('school/turns');
    }

    public function delete($id) {
        Turn::find($id)->delete();
        return Redirect::to('school/turns');
    }

    public function update($id) {
        $turn = Turn::find($id);
        return view('turn_update', ['turn' => $turn]);
    }
}
