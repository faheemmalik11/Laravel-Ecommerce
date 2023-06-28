<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Product $product){
        $cart = auth()->user()->cart;
        $cart->products()->attach($product->id);
        return redirect()->back();
    }

    public function show(){
        $cart = auth()->user()->cart;
        $products = $cart->products;
        return view('cart.index',compact('products'));
        
    }

    public function remove(Product $product){
        $cart = auth()->user()->cart;
        $cart->products()->detach($product->id);
        return redirect()->back();
    }
}
