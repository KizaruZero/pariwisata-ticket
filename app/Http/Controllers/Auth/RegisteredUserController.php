<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:admin,user'], // Validate role
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // Assign role
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('profile', absolute: false));
    }


    // UserController.php
    public function canReview($destinationId)
    {
        try {
            $user = Auth::user();

            if (!$user) {
                return response()->json(['canReview' => false, 'message' => 'User not authenticated'], 401);
            }

            // Memeriksa apakah pengguna memiliki pesanan yang disetujui untuk destinasi tersebut
            $hasOrder = Order::where('user_id', $user->id)
                ->whereHas('packagePricing.destination', function ($query) use ($destinationId) {
                    $query->where('destinations.id', $destinationId);
                })
                ->where('status', 'approved')
                ->exists();

            return response()->json(['canReview' => $hasOrder]);
        } catch (\Exception $e) {
            // Log error dan tangani pengecualian
            \Log::error('Error in canReview method: ' . $e->getMessage());

            return response()->json(['error' => 'User Belum Pernah Order'], 500);
        }
    }

    // buat fungsi cek apakah user sudah login
    public function checkUser()
    {
        try {
            $user = Auth::user();

            if (!$user) {
                Inertia::render('Auth/Login');
                return response()->json(['isAuthenticated' => false]);
            }

            return response()->json(['isAuthenticated' => true, 'user' => $user]);
        } catch (\Exception $e) {
            // Log error dan tangani pengecualian
            \Log::error('Error in checkUser method: ' . $e->getMessage());

            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }



}
