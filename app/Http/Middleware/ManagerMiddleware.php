<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ManagerMiddleware
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
        if (auth()->user()->role == 1) {
            return $next($request);
        }elseif (auth()->user()->role == 2) {
            return redirect('/');
        }

        return redirect('home')->with('error', 'You are not allowed to this page');
    }
}
