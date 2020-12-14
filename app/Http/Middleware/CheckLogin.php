<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        if($request->session()->get('loginStatus')&&$request->session()->get('loginID'))
            return $next($request);
        else
            return redirect('/login')->with('message','Login failed, please check your account!');
    }
}
