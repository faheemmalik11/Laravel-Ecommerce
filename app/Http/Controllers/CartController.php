<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // public function add(Product $product){
    //     auth()->user()->carts()->create(['product_id'=>$product->id]);
    //     return redirect()->back();
    // }

    // public function show(){
    //     $carts = auth()->user()->carts;
    //     $products = auth()->user()->products;
        
    //     return view('cart.index',compact('carts','products'));
    // }
}
