<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRoleMiddleware{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response{
        //definir condicion de acceso a la ruta
        /*
        if(auth()->user()->email=="angel.condori@gmail.com"){
            return $next($request);
        }else{
            return redirect('No autorizado');
        }
        */
        return $next($request);
    }
}
