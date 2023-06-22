<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('category.index',compact('categories'));
    }

    public function create(){
        $inputs = request()->validate([
            'name'=>'required', 'string', 'min:2','max:50',
        ]);
        Category::create($inputs);
        request()->session()->flash('cat-create',$inputs['name'].' Added Successfully');
        return redirect()->back();
    }
    public function show(Category $category){
        return view('category.show',compact('category'));
    }

    public function update(Category $category){
        $inputs = request()->validate([
            'name'=>'required', 'string', 'min:2','max:50',
        ]);
        $category->update($inputs);
        request()->session()->flash('cat-update',$category->name.' Update Successfully');
        return redirect()->route('category.index');
    }

    public function delete(Category $category){
        $category->delete();
        request()->session()->flash('cat-del',$category->name .' Deleted Successfully');
        return redirect()->back();
    }
}
