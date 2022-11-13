<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserEventController extends Controller
{
    //
    public function detail($id) {
       $user = User::find($id);
       $events = $user->events;
      
       return response()->json($events);

    }
}
