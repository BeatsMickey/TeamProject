<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class IsAdminCheckForView
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
        $admin = Auth::user() ? Auth::user()->is_admin : false;
        \View::share('admin', $admin);
        return $next($request);
    }
}
