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

                if(isset($_COOKIE['credentials'])){
        
                    $credentials = json_decode($_COOKIE['credentials']);
                    // dd($credentials);
                    foreach ($credentials as $key => $value) {
                        
                        $credArray[$key] = $value;
                       
                    };

                    $token = Auth::attempt($credArray);
                    $user = Auth::user();
                    
                
                
                    return $next($request);
                }
                return redirect()->route('login');
        
            
            
        
        
    }
}