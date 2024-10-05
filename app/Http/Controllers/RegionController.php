<?php

namespace App\Http\Controllers;
use App\Models\Region;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RegionController extends Controller
{
    //get all region
    public function getRegion()
    {
        // Caching selama 1 jam (3600 detik)
        $regions = Cache::remember('regions', 600, function () {
            return Region::all();
        });

        return response()->json($regions);
    }
}
