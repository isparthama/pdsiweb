<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class AuthenticatePengguna
{

    public function handle($request, Closure $next,  ...$guards)
    {
        //Auth::logout();
        //dd(Auth::guard($guards)->check());
        if (!Auth::guard($guards)->check()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect('/login');
            }
        }

        return $next($request);
    }
}
