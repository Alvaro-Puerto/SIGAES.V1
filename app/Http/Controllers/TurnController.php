<?php

namespace App\Http\Controllers;

use App\Models\SchoolInformation;
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
        $turns = $this->school->turn;

        return view('list_turn', ['turns' => $turns]);
    }

    public function create(Request $request) {
        $this->school->turn()->updateOrCreate(
            ['id' => $request->id],
            $request->all()
        );

        return Redirect::to('school/turns');
    }
}
