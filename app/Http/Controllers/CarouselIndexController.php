<?php

namespace App\Http\Controllers;

use App\Models\CarouselIndex;
use Illuminate\Http\Request;

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
}
