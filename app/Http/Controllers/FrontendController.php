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

    // public function vacations()
    // {
    //     return Inertia::render('Vacations');
    // }

    public function about()
    {
        return Inertia::render('Frontend/AboutView');
    }

    // public function contact()
    // {
    //     return Inertia::render('Contact');
    // }
}
