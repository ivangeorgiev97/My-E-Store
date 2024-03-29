<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckIfAdmin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) 
    {
        if (Auth::check()) {
            if (Auth::user()->permission !== 3) {
                return redirect('/home');
            }
        }

        return $next($request);
    }

}
