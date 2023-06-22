<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;
class HomeController extends Controller
{

    
    public function check(Request $request){
        
            // dd($_COOKIE['credentials']);
            // $credentials = json_decode($credentials);
            // dd(\Cookie::get('credentials'));
            // dd( session('credentials'));
        return view('home');
}
}
