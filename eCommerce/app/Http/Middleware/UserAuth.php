<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {//ovde onemogucavam korisniku da vidi login page ako je vec ulogovan, u kerlen.php sam omogucio startovanje sesije
        if($request->path()=="login" && $request->session()->has('user')){
            return redirect('/');
        }
        return $next($request);
    }
}
