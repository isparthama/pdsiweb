<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next, $module = null, ...$guards)
     {

         if (!Auth::guard($guards)->check()) {
            return redirect('/login');
         } else {
            if(!empty($module)){
                $status = false;
                $modules = explode("|",$module);
                $role = Auth::user()->hasRoleName();
                
                if (in_array($role->slug, $modules)) {
                    $status = true;
                }

                if(!$status){
                    if ( $request->isJson() || $request->wantsJson() ) {
                        return response()->json([
                            'error' => [
                                'status_code' => 401,
                                'code'        => 'INSUFFICIENT_PERMISSIONS',
                                'description' => 'You are not authorized to access this resource.'
                            ],
                        ], 401);
                    }

                    return abort(401, 'You are not authorized to access this resource.');
                }

                return $next($request);
            }
         }
     }
}
