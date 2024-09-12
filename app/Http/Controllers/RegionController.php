<?php

namespace App\Http\Controllers;
use App\Models\Region;

use Illuminate\Http\Request;

class RegionController extends Controller
{
    //get all region
    public function getRegion()
    {
        $region = Region::all();
        return response()->json($region);
    }
}
