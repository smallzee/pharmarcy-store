<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //

    protected $table = "inventory";
    protected $guarded = [];

    function product(){
        return $this->hasOne(Products::class,'id','product_id');
    }

    function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}
