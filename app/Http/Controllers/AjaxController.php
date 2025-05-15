<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Region;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getdistrict(Request $request){
        $districts = District::where('region_id', $request->region_id)->get();
        return response()->json([
            'data' => $districts
        ]);
    }
}
