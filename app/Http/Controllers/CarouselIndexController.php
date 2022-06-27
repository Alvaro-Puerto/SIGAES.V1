<?php

namespace App\Http\Controllers;

use App\Models\CarouselIndex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CarouselIndexController extends Controller
{
    //
    public function create(Request $request) {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $path = $request->file('file')->store('student_picture');
        
        CarouselIndex::create(['url' => $path]);
        
        return back($status = 302);
    }

    public function delete($id) {
        CarouselIndex::delete($id);

        return Redirect::back();
    }
}
