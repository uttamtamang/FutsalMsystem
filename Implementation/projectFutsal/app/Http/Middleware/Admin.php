<?php

namespace App\Http\Middleware;
use Auth;

use Closure;

class Admin
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
        if(  Auth::user() && Auth::user()->usertype==1){
        
        return $next($request);
    }
    return redirect('home');
}

}
