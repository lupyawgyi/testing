<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class ticket_reject
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
            if ($user->hasAnyPermission('ticket_reject')){
                return $next($request);
            }else{
                return redirect(URL::previous());
            }
        }
    }
}
