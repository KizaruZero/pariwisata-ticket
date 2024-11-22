<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();
        $user = Auth::user();
        $token = JWTAuth::fromUser($user);
        $request->session()->regenerate();

        // You can also send it as a cookie
        return redirect()
            ->intended(route('home', absolute: false))
            ->withCookie(cookie('jwt_token', $token, 60)); // Cookie expires in 60 minutes

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        try {
            // Periksa apakah token ada di header atau cookie
            if (!$token = JWTAuth::getToken()) {
                $token = $request->cookie('jwt_token'); // Ambil dari cookie
                JWTAuth::setToken($token); // Set token ke JWTAuth
            }

            // Invalidasi token JWT
            JWTAuth::invalidate($token);
        } catch (\Exception $e) {
            // Token tidak ditemukan atau invalid, abaikan
        }

        // Logout dari session Laravel
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Hapus cookie JWT
        return redirect('/')->withCookie(cookie('jwt_token', null, -1));
    }
}
