<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Middleware\Admin;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->isAdmin==1){
            return $next($request);
        } else {
            return  abort('403' , 'Akses ditolak');
        }
        
    }
}
