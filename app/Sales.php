<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    //
    protected $table = "sales";
    protected $guarded = [];

    function user(){
        return $this->hasOne(User::class,'id','student_id');
    }

    function inventory(){
        return $this->hasOne(Inventory::class,'id','inventory_id');
    }
}
