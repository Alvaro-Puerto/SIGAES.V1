<?php 
namespace App\Http\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Redirect;

trait UserTrait {

    public function inactiveUser($id) {
        $user = User::find($id);
        $user->status = false;
        $user->save();
        return Redirect::back();
    }

    public function activeUser($id) {
        $user = User::find($id);
        $user->status = true;
        $user->save();
        return Redirect::back();
    }

}

?>