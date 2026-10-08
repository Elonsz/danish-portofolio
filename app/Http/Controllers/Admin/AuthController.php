<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function create(Request $request): View|RedirectResponse
    {
        if ($request->session()->get('portfolio_admin_authenticated') || $request->user()?->is_admin) {
            return redirect()->route('admin.certificates.index');
        }

        return view('admin.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $adminEmail = config('portfolio.admin.email', 'danish@admin.me');
        $adminPassword = config('portfolio.admin.password', 'danishsecret2026!');

        // 1. Standalone authentication without database (credentials configured in .env / config)
        $matchesConfig = hash_equals(strtolower((string) $adminEmail), strtolower((string) $credentials['email']))
            && hash_equals((string) $adminPassword, (string) $credentials['password']);

        // 2. Database fallback if database service is running
        $matchesDb = false;
        try {
            $matchesDb = Auth::attempt([...$credentials, 'is_admin' => true]);
        } catch (\Throwable $e) {
            // Database may be offline, ignore safely
        }

        if ($matchesConfig || $matchesDb) {
            $request->session()->regenerate();
            $request->session()->put('portfolio_admin_authenticated', true);
            $request->session()->put('portfolio_admin_email', $credentials['email']);

            return redirect()->intended(route('admin.certificates.index'));
        }

        return back()->withErrors([
            'email' => 'Email atau password tidak sesuai.',
        ])->onlyInput('email');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->session()->forget(['portfolio_admin_authenticated', 'portfolio_admin_email']);
        try {
            Auth::logout();
        } catch (\Throwable $e) {
            // Ignore
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
