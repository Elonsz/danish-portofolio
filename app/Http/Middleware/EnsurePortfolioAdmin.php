<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsurePortfolioAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        $isSessionAuthed = $request->session()->get('portfolio_admin_authenticated') === true;
        $isDbAuthed = $request->user() && $request->user()->is_admin;

        if (! $isSessionAuthed && ! $isDbAuthed) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
