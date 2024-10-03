<?php
namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Category;
use App\Models\Region;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DestinationController extends Controller
{

    public function getDestinationDetail($id)
    {
        $destination = Destination::with('region', 'category', 'reviews.user')->findOrFail($id);
        // $viewedDestinations = session()->get('viewed_destinations', []);

        // if (!in_array($id, $viewedDestinations)) {
        //     // Jika belum, tambahkan ke session dan tingkatkan views
        //     $destination->incrementViews();

        //     // Simpan ID destinasi yang sudah di-view ke dalam session
        //     session()->push('viewed_destinations', $id);
        // }

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
        $category = $request->input('category');
        $region = $request->input('region');
        $minRating = $request->input('minRating');
        $maxRating = $request->input('maxRating');

        // Build the query with filters
        $query = Destination::query();

        if ($category) {
            $query->where('category_id', $category);
        }

        if ($region) {
            $query->where('region_id', $region);
        }

        if ($minRating) {
            $query->where('rating', '>=', $minRating);
        }

        if ($maxRating) {
            $query->where('rating', '<=', $maxRating);
        }

        // Eager load relationships and get filtered results
        $destinations = $query->with(['region', 'category', 'reviews.user'])->get();

        // Fetch all categories and regions for the filter options
        $categories = Category::all();
        $regions = Region::all();

        // Return the results to the Vue component
        return Inertia::render('Dashboard/DestinationView', [
            'data' => $destinations,
            'filters' => $request->all(), // Pass the current filters back to the frontend
            'categories' => $categories,
            'regions' => $regions,
        ]);
    }

    public function filterByCategory(Request $request)
    {
        $categoryId = $request->query('category_id');

        $query = Destination::query();

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $destinations = $query->with(['category', 'region'])->get();

        return response()->json(data: $destinations);
    }

    public function filterByRegion(Request $request)
    {
        $regionId = $request->query('region_id');

        $query = Destination::query();

        if ($regionId) {
            $query->where('region_id', $regionId);
        }

        $destinations = $query->with(['category', 'region'])->get();

        return response()->json(data: $destinations);
    }

    public function filterByRating(Request $request)
    {
        $minRating = $request->query('min_rating');
        $maxRating = $request->query('max_rating');

        $query = Destination::query();

        if ($minRating) {
            $query->where('rating', '>=', $minRating);
        }

        if ($maxRating) {
            $query->where('rating', '<=', $maxRating);
        }

        $destinations = $query->with(['category', 'region'])->get();

        return response()->json(data: $destinations);
    }

    public function getPopularDestination()
    {
        $destinations = Destination::orderBy('total_orders', 'desc')->limit(5)->get();
        return response()->json($destinations);
    }

    public function getRecommendedDestination()
    {
        // Mengambil destinasi yang disortir berdasarkan popularity, descending
        $recomendation = Destination::orderBy('popularity', 'desc')->take(10)->get();

        return response()->json($recomendation);

    }


}