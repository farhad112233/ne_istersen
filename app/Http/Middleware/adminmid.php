<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminmid
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
        if (auth()->user()->rol==="adminn"){
            return $next($request);
        }else{
            $note='you are not a admin';
            return abort(401);
//            return response('<h1>You don\'t have access to this page</h1>',401);
        }

    }
}
