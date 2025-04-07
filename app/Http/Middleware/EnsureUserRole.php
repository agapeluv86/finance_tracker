<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class EnsureUserRole
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && ($user->role === 'admin' || $user->role === 'super_admin')) {
            return redirect()->route('admin.dashboard'); // Redirect instead of aborting
        }

        return $next($request);
    }
}
