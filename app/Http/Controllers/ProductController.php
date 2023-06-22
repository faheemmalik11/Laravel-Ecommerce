<?php



namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        $categories = Category::all();
        return view('product.index',compact('products','categories'));
    }

    public function create(){
      
        $inputs = request()->validate([
            'name'=>'required', 'string', 'min:2','max:50',
            'description'=>'required','max:255','string',
            'price'=>'required',
            'category'=>'required'
        ]);
        
        unset($inputs['category']);    
        $product = auth()->user()->products()->create($inputs);
        $product->categories()->attach(request('category'));
        request()->session()->flash('product-create',$inputs['name'].' Added Successfully');
        return redirect()->back();
    }


    public function show(Product $product){
        $categories = Category::all();
        return view('product.show',compact('product','categories'));
    }

    // public function update(Product $product){
    //     $inputs = request()->validate([
    //         'name'=>'required', 'string', 'min:2','max:50',
    //     ]);
    //     $product->update($inputs);
    //     request()->session()->flash('cat-update',$product->name.' Update Successfully');
    //     return redirect()->route('product.index');
    // }

    public function delete(Product $product){
        $product->delete();
        request()->session()->flash('product-del',$product->name .' Deleted Successfully');
        return redirect()->back();
    }
}

