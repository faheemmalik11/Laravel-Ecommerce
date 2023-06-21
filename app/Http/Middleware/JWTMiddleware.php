<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Support\Facades\Session;

class JWTMiddleware
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
            $credArray = [];
            try {
                if($_COOKIE['credentials']){
        
                    $credentials = json_decode($_COOKIE['credentials']);
                    foreach ($credentials as $key => $value) {
                        $credArray[$key] = $value;
                            
                    };
                    
                    
                    $token = Auth::attempt($credArray);
                    $user = Auth::user();
                    if (!$token) {
                        return route('login');
                    }
                    return $next($request);
                }
            } catch (\Throwable $th) {
                return redirect()->route('login');
            }
            
            
        
        
    }
}