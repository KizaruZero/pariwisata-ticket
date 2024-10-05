<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class FavoriteController extends Controller
{
    public function likeDestination($id, Request $request)
    {
        try {
            $destination = Destination::findOrFail($id);
            $user = Auth::user();

            if (!$user) {
                return response()->json(['message' => 'User not authenticated'], 401);
            }

            if ($user->likedDestinations()->where('destination_id', $id)->exists()) {
                // User has already liked the destination, so perform unlike
                $user->likedDestinations()->detach($destination->id);
                $destination->decrementLikes(); // Assuming you have a decrementLikes method
                return response()->json(['message' => 'Successfully unliked the destination', 'isLiked' => false]);
            }

            // Like the destination
            $user->likedDestinations()->attach($destination->id);
            $destination->incrementLikes(); // Assuming you have an incrementLikes method
            return response()->json(['message' => 'Successfully liked the destination', 'isLiked' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getFavoriteDestinations(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }

        $favoriteDestinations = $user->likedDestinations()->get();
        return response()->json(['data' => $favoriteDestinations]);
    }



}
