<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table = "products";
    protected $guarded = [];

    function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    function drug_type(){
        return $this->hasOne(Drug_type::class,'id','drug_type_id');
    }
}
