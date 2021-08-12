<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 2021-07-29
 * Time: 08:26
 */

function image_url($src){
    return url('assets/images/'.$src);
}

function role($id){
    $data = \App\Role::where("id",$id)->first();
    return $data['name'];
}

function category($id,$value){
    $data = \App\Category::where('id',$id)->first();
    return $data[$value];
}

function drug_type($id,$value){
    $data = \App\Drug_type::where('id',$id)->first();
    return $data[$value];
}

function department($id,$value){
    $data = \App\Department::where('id',$id)->first();
    return $data[$value];
}

function level($id,$value){
    $data = \App\Level::where('id',$id)->first();
    return $data[$value];
}

function product($id,$value){
    $data = \App\Products::where('id',$id)->first();
    return $data[$value];
}