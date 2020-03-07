<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if (\Auth::User()->user_type != 'admin') {
            return redirect('home')->withMessage('you have to be an admin to view the page');
        }
        return $next($request);
    }
}
