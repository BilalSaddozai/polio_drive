<?php

namespace App\Http\Middleware;

use Closure;
use Error;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use function Laravel\Prompts\error;

class IsAdmin
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
        if(auth()->user()->is_admin == 1){
            return $next($request);
        }
   
        return redirect("home")->with(error);
    }
}