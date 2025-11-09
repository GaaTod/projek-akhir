<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Ambil user yang sedang login
        $user = $request->user();

        // Cek role admin → SELALU ke dashboard admin
        if ($user->role === 'admin') {
            return redirect()
                ->route('dashboard.admin')
                ->with('success', 'Selamat datang kembali, Admin!');
        }

        // Ambil redirect_to (jika user alumni login dari forum)
        $redirectTo = $request->input('redirect_to');

        // Validasi URL redirect_to agar tidak open redirect
        if ($redirectTo && Str::startsWith($redirectTo, url('/'))) {
            return redirect()->to($redirectTo)->with('success', 'Login berhasil.');
        }

        // Jika tidak ada redirect_to, arahkan sesuai role user
        if ($user->role === 'alumni') {
            return redirect()
                ->route('dashboard.user')
                ->with('success', 'Login berhasil! Selamat datang di dashboard alumni.');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Berhasil Logout');
    }
}