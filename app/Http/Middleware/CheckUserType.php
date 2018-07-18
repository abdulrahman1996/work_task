<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserType
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

        if(Auth::user() !=null)
        {
            if(Auth::user()->type = 0)
            {
                return redirect('/login');
            }
            else{
                return $next($request);
            }
        }
        return redirect('/login');
    }
}
