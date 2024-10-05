<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function getCategory()
    {
        // Caching selama 1 jam (3600 detik)
        $categories = Cache::remember('categories', 600, function () {
            return Category::all();
        });

        return response()->json([
            'data' => $categories
        ]);
    }
}
