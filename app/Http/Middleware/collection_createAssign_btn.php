<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class collection_createAssign_btn
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
            if ($user->hasAnyPermission('collection_createAssign_btn')){
                return $next($request);
            }else{
                return redirect(URL::previous());
            }
        }
    }
}
