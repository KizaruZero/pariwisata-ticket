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
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
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
        try {
            \Log::info('Login attempt', [
                'token' => $request->input('token'),
                'ip' => $request->ip()
            ]);

            $response = Http::post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                'secret' => config('services.turnstile.secret_key'),
                'response' => $request->input('token'),
                'remoteip' => $request->ip()
            ]);

            \Log::info('Turnstile response', [
                'response' => $response->json()
            ]);

            if (!$response->json('success')) {
                throw ValidationException::withMessages([
                    'token' => 'CAPTCHA verification failed: ' . ($response->json('error-codes')[0] ?? 'Unknown error')
                ]);
            }

            $request->authenticate();
            $user = Auth::user();
            $token = JWTAuth::fromUser($user);
            $request->session()->regenerate();

            return redirect()
                ->intended(route('home', absolute: false))
                ->withCookie(cookie('jwt_token', $token, 120));
        } catch (\Exception $e) {
            \Log::error('Login error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            throw $e;
        }
    }
    /**
     * Destroy an authenticated session.
     */

     public function destroy(Request $request): RedirectResponse
    {
    // Invalidasi token JWT yang sudah terverifikasi
    JWTAuth::invalidate(JWTAuth::getToken());
    
    // Logout dari session Laravel
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redirect dan hapus cookie
    return redirect('/')->withoutCookie('jwt_token');
    }
    // public function destroy(Request $request): RedirectResponse
    // {
    //     try {
    //         // Periksa apakah token ada di header atau cookie
    //         if (!$token = JWTAuth::getToken()) {
    //             $token = $request->cookie('jwt_token'); // Ambil dari cookie
    //             JWTAuth::setToken($token); // Set token ke JWTAuth
    //         }

    //         // Invalidasi token JWT
    //         JWTAuth::invalidate($token);
    //     } catch (\Exception $e) {
    //         // Token tidak ditemukan atau invalid, abaikan
    //     }

    //     // Logout dari session Laravel
    //     Auth::guard('web')->logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     // Hapus cookie JWT dengan metode yang benar
    //     return redirect('/')
    //         ->withoutCookie('jwt_token'); // Gunakan withoutCookie()
    // }
}
