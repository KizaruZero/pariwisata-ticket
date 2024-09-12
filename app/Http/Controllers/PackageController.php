<?php

namespace App\Http\Controllers;
use App\Models\PackagePricing;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    //
    public function getPackageDetail($id)
    {
        $packages = PackagePricing::with('package', 'destination')
            ->where('destination_id', $id)
            ->get();
        return response()->json($packages);

    }
}
