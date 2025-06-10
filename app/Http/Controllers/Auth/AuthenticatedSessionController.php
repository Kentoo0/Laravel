<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Tangani permintaan login.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Proses autentikasi
        $request->authenticate();

        // Regenerate session
        $request->session()->regenerate();

        // Redirect sesuai role user
        $user = Auth::user(); // pakai Auth facade

        if ($user && $user->is_admin) {
            // Jika admin, langsung ke dashboard
            return redirect()->route('dashboard');
        }

        // Jika user biasa, redirect ke halaman sebelumnya / home
        return redirect()->intended('/');
    }

    /**
     * Logout user.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
