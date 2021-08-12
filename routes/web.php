<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});


Route::group(['namespace'=>'account','prefix'=>'auth'], function (){
    Route::resource("login", "LoginController");
});

Route::group(['namespace'=>'admin','prefix'=>'admin'], function (){

    Route::middleware(['auth'])->group(function (){

        Route::get('/dashboard', "AdminController@dashboard")->name('dashboard');

        Route::get('/users', "AdminController@users")->name('users');
        Route::post('/create_new_user', "AdminController@create_new_user")->name('create_new_user');

        Route::get('/category', "ProductController@category")->name('category');
        Route::get('/sales', "ProductController@obtain")->name('sales');
        Route::get('/inventory', "ProductController@inventory")->name('inventory');
        Route::get('/expired', "ProductController@expired")->name('expired');
        Route::post('/create_new_category', "ProductController@create_new_category")->name('create_new_category');
        Route::get('/edit-category/{category}', "ProductController@edit_category")->name('edit_category');
        Route::get('/edit-inventory/{inventory}', "ProductController@edit_inventory")->name('edit_category');
        Route::get('/edit-product/{products}', "ProductController@edit_product")->name('edit_product');
        Route::post('/update_category', "ProductController@update_category")->name('update_category');

        Route::post('/create_new_inventory', "ProductController@create_new_inventory")->name('create_new_inventory');
        Route::post('/update_inventory', "ProductController@update_inventory")->name('update_inventory');

        Route::post('/create_new_drug_type', "ProductController@create_new_drug_type")->name('create_new_drug_type');
        Route::get('/edit-drug-type/{drug_type}', "ProductController@edit_drug_type")->name('edit_drug_type');
        Route::post('/update_drug_type', "ProductController@update_drug_type")->name('update_drug_type');
        Route::post('/update_drug_product', "ProductController@update_drug_product")->name('update_drug_product');
        Route::get('/drug-type', "ProductController@drug_type")->name('drug_type');
        Route::get('/drug-obtained', "ProductController@drug_obtained")->name('drug_obtained');

        Route::post('/create_obtain_drug', "ProductController@create_obtain_drug")->name('create_obtain_drug');


        Route::get('/drug-products', "ProductController@drug_products")->name('drug_products');
        Route::get('/view/{user}', "StudentController@view")->name('view');
        Route::post('/create_new_drug_product', "ProductController@create_new_drug_product")->name('create_new_drug_product');


        Route::get('/customers', "StudentController@students")->name('students');

        Route::post('/create_new_student', "StudentController@create_new_student")->name('create_new_student');


    });
});