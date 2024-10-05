<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return Inertia::render('Frontend/HomeView');
    }

    public function destinations()
    {
        return Inertia::render('Frontend/DestinationView');
    }

    public function destinationsDetail($id)
    {
        return Inertia::render('Frontend/DestinationDetail', [
            'id' => $id,  // Pastikan 'id' dikirimkan ke Vue
        ]);
    }


    // public function vacations()
    // {
    //     return Inertia::render('Vacations');
    // }

    public function about()
    {
        return Inertia::render('Frontend/AboutView');
    }

    public function article()
    {
        return Inertia::render('Frontend/ArticleView');
    }
    public function articleDetail($id)
    {
        return Inertia::render('Frontend/ArticleDetail', [
            'id' => $id,  // Pastikan 'id' dikirimkan ke Vue
        ]);
    }
}
