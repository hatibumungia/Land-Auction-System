<?php

namespace App\Http\Middleware;

use Closure;
use App\UserDetail;
use Illuminate\Support\Facades\Session;

class RedirectUserIfNotStaff
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
        if(!Session::has('id')){
            return redirect('/');
        }

        if( ! UserDetail::findOrFail(Session::get('id'))->hasRole('admin')){
            return redirect('/');
        }

        return $next($request);
    }
}
