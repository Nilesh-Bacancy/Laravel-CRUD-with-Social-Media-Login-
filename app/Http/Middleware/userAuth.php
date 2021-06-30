<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class userAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(($request->path()=="login" || $request->path()=="/") && $request->session()->has('admin'))
        {
            return redirect('Admin/adminhome');
        }
        if(($request->path()=="login" || $request->path()=="/") && $request->session()->has('customer'))
        {
            return redirect('customerhome');
        }
        return $next($request);
    }
}
