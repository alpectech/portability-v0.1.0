<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ward;

class DynamicDropdownController extends Controller
{
    public function fetch(Request $request) 
    {
        $wards=Ward::where('constituency_id',$request->constituency_id)->pluck('name');

        return response()->json($wards);
    }
}
