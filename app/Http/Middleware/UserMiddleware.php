<?php

namespace App\Http\Middleware;

use Closure;

class UserMiddleware
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
        if (\Auth::User()->user_type != 'client') {
            return redirect('home')->withMessage('you have to be a user to view the page');
        }
        return $next($request);
    }
}
