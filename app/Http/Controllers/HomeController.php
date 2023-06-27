<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;


class HomeController extends Controller
{

    
    public function index(Request $request){
        $categories = Category::all();
        return view('home',compact('categories'));
}

public function show_category(Category $category){
    return view('home',compact('category'));
}
}
