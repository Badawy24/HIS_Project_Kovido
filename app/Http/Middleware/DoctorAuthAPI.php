<?php

namespace App\Http\Middleware;

use App\Helpers\DoctorsTokenManager;
use Closure;
use Illuminate\Http\Request;

class DoctorAuthAPI
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
        if(DoctorsTokenManager::currentDoctor($request)){
            return $next($request);
        }
        else {
            return response([
                'error' => 'you are not autherized',
            ],401);
        }
    }
}
