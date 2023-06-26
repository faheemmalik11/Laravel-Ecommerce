<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;
use App\Models\Category;

class HomeController extends Controller
{

    
    public function check(Request $request){
        $categories = Category::all();
        return view('home',compact('categories'));
}
}
