<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function getProductImageAttribute($value){
        if(!Str::contains($value,'https')){
            return "storage/".$value;
    }
        return $value;
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }


}
