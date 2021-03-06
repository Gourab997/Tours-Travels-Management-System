<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class sessionCheck
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
        if($request->session()->has('username')){

          $request->session()->flash('msg','Invalid request');
          return $next($request);
        }
    else{
        return redirect('/login');
    }
    }
}
