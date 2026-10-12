<?php

namespace App\\Http\\Controllers\\Admin;

use App\\Http\\Controllers\\Controller;
use Illuminate\\Http\\RedirectResponse;
use Illuminate\\Http\\Request;
use Illuminate\\View\\View;

class AuthController extends Controller
{
    public function create(Request $request): View|RedirectResponse
    {
        if ($request->session()->get('portfolio_admin_authenticated') === true) {
            return redirect()->route('admin.certificates.index');
        }

        return view('admin.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'max:200'],
        ]);

        $adminEmail = (string) config('portfolio.admin.email');
        $adminPassword = (string) config('portfolio.admin.password');
        $valid = $adminPassword !== ''
            && hash_equals(strtolower($adminEmail), strtolower((string) $credentials['email']))
            && hash_equals($adminPassword, (string) $credentials['password']);

        if (! $valid) {
            return back()->withErrors(['email' => 'Email atau password tidak sesuai.'])->onlyInput('email');
        }

        $request->session()->regenerate();
        $request->session()->put('portfolio_admin_authenticated', true);
        $request->session()->put('portfolio_admin_email', strtolower($credentials['email']));

        return redirect()->intended(route('admin.certificates.index'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->session()->forget(['portfolio_admin_authenticated', 'portfolio_admin_email']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
