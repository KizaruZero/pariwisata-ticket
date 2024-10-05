<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //get all posts
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function getLatestPost()
    {
        $post = Post::latest()->take(5)->get();
        return response()->json($post);
    }

    public function getPostDetail($id)
    {
        $post = Post::with('author', 'destination')->findOrFail($id); // ternyata relations disini isinya nama fungsi yang ada di model
        return response()->json($post);
    }
}
