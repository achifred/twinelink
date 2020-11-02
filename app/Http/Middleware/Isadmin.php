<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Isadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard=null)
    {
        if(Auth::guard('admin')->guest()){
            return redirect('/me');
        }
        return $next($request);
    }
}
