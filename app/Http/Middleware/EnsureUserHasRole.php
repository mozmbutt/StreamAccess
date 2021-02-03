<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check())
            return redirect('/404');

        $user = Auth::user();

        if ($user->isAdmin()) {
            return $next($request);
        }

        // Check if user has the role This check will depend on how your roles are set up
        if (role($role)) {
            return $next($request);
        }
        return redirect('login');
    }
}
