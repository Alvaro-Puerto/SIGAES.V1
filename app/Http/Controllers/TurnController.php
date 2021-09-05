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
            $turns = $this->school->turn;
            return view('list_turn', ['turns' => $turns]);
        } else {
            return redirect('school/setting');
        }
    }

    public function create(Request $request) {
        $this->school->turn()->updateOrCreate(
            ['id' => $request->id],
            $request->all()
        );

        return Redirect::to('school/turns');
    }

    public function delete($id) {
        Turn::find($id)->delete();
        return Redirect::to('school/turns');
    }
}
