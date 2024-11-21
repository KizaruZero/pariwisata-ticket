<?php
namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Category;
use App\Models\Region;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DestinationController extends Controller
{

    private const CACHE_TTL = 300; // 5 minutes


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

        if ($request->has('keyword')) {
            $keyword = $request->input('keyword');
            $query->where('name', 'like', "%$keyword%");
        }


        $destinations = $query->with([
            'category:id,name',
            'region:id,name',


        ])->get();

        return response()->json([
            'data' => $destinations
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
        $recomendation = Destination::orderBy('popularity', 'desc')->take(5)->get();
        ;
        return response()->json($recomendation);
    }

    public function getRecommendedDestinationByUser()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $recommendedDestinations = collect($user->getRecommendedDestinations());
        } else {
            // If the user is not logged in, show popular destinations
            $recommendedDestinations = collect(Destination::orderBy('popularity', 'desc')->take(5)->get());
        }


        // Map through recommended destinations to add lowest price inside package_pricings


        return response()->json($recommendedDestinations);
    }

    // Search destination by name
    public function searchDestination($keyword)
    {
        $destinations = Destination::where('name', 'like', "%$keyword%")
            ->get();

        return response()->json($destinations);
    }







}