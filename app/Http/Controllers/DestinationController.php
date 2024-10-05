<?php
namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Category;
use App\Models\Region;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class DestinationController extends Controller
{

    public function getDestinationDetail($id)
    {
        $destination = Destination::with('region', 'category', 'reviews.user', 'articles')->findOrFail($id);
        $destination->updateTotalViews();
        return response()->json($destination);
    }

    public function getDestination()
    {
        return response()->json([
            'data' => Destination::all()
        ]);
    }

    public function index(Request $request)
    {
        // Get filter criteria from the request
        $query = Destination::query();

        if ($request->has('category')) {
            $categoryId = $request->input('category');
            if ($categoryId) {
                $query->where('category_id', $categoryId);
            }
        }

        if ($request->has('region')) {
            $regionId = $request->input('region');
            if ($regionId) {
                $query->where('region_id', $regionId);
            }
        }
        $destinations = $query->with([
            'category:id,name',
            'region:id,name'
        ])
            ->with([
                'packagePricings' => function ($q) {
                    $q->select('destination_id', DB::raw('MIN(price) as lowest_price'))->groupBy('destination_id');
                }
            ])
            ->get();

        return response()->json([
            'data' => $destinations
        ]);
    }
    public function getLowestPrice($id)
    {
        $destination = Destination::findOrFail($id);
        $lowestPrice = $destination->packagePricings()
            ->orderBy('price', 'asc')
            ->first();

        return response()->json([
            'lowest_price' => $lowestPrice ? $lowestPrice->price : null
        ]);
    }

    public function getPopularDestination()
    {
        $destinations = Destination::orderBy('total_orders', 'desc')->limit(5)->get();
        return response()->json($destinations);
    }

    public function getRecommendedDestination()
    {
        // Mengambil destinasi yang disortir berdasarkan popularity, descending
        $recomendation = Destination::orderBy('popularity', 'desc')->take(5)->with([
            'packagePricings' => function ($q) {
                $q->select('destination_id', DB::raw('MIN(price) as lowest_price'))->groupBy('destination_id');
            }
        ])->get();
        ;

        return response()->json($recomendation);

    }


}