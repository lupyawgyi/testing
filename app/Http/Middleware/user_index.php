<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class user_index
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()){
            return redirect('/');
        }else{
            $user = Auth::user();
            if ($user->hasAnyPermission('user_index')){
                return $next($request);
            }else{
                return redirect(URL::previous());
            }
        }
        return $next($request);
    }
}
