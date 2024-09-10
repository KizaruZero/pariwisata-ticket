<?php
// ReviewController.php
namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // Store a new review
    // ReviewController.php
    public function store(Request $request)
    {
        $validated = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'rating' => 'required|integer|between:1,5',
            'review_text' => 'required|string|max:500',
        ]);

        try {
            $review = Review::create([
                'user_id' => Auth::id(),
                'destination_id' => $validated['destination_id'],
                'rating' => $validated['rating'],
                'review_text' => $validated['review_text'],
            ]);

            return response()->json($review, 201);
        } catch (\Exception $e) {
            \Log::error('Error creating review: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

}
