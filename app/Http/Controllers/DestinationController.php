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
}