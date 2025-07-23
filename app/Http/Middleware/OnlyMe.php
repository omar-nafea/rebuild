<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlyMe
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      if(auth()->check()){
        if(auth()->user()->email == 'o24@gmail.com')
        {
        return $next($request);
        }
        
      return response (["message" => "Access not Autherized"], 403);
      }
            return redirect()->route('login.show');
    }
}
