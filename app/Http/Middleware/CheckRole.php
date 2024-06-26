<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {

        dd($request);

        if (!$request->user()) {
            return redirect()->to('/home');
        }

        foreach($roles as $role){
            if($request->user()->hasRole($role)){
                return $next($request);
            } else {
                return redirect()->to('/home');
            }
        }


    }
}
