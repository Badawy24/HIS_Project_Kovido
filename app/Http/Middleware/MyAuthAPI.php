<?php

namespace App\Http\Middleware;

use App\Helpers\MyTokenManager;
use Closure;
use Illuminate\Http\Request;

class MyAuthAPI
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(MyTokenManager::currentPatient($request)){
            return $next($request);
        }
        else {
            return response([
                'error' => 'you are not autherized',
            ],401);
        }
    }
}
