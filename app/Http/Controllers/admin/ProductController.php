<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Drug_type;
use App\Http\Controllers\Controller;
use App\Inventory;
use App\Products;
use App\Sales;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function level(){
        $data['page_title'] = "All Level";
        return view('admin.level',$data);
    }

    public function category(){
        $data['page_title'] = "Drug Category";
        return view('admin.category',$data);
    }

    public function create_new_category(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|unique:category|min:3|max:200'
        ]);

        if ($validator->fails()){

            $msg = (count($validator->errors()->all()) == 1) ? 'An error occurred' : 'Some error(s) occurred';

            foreach ($validator->errors()->all() as $value){
                $msg.='<p>'.$value.'</p>';
            }

            return redirect()->back()->with('flash_error',$msg)->withInput();

        }

        $category = new Category([
            'name'=>$request->name
        ]);

        if ($category->save()){
            return back()->with('flash_info','Drug category has been added successfully');
        }
    }

    public function edit_category(Category $category){
        $data['page_title'] = "Edit Category";
        $data['category'] = $category;
        return view('admin.edit-category',$data);
    }


    public function update_category(Request $request){

        $validator = Validator::make($request->all(),[
            'name'=>'required|min:3|max:200'
        ]);

        if ($validator->fails()){

            $msg = (count($validator->errors()->all()) == 1) ? 'An error occurred' : 'Some error(s) occurred';

            foreach ($validator->errors()->all() as $value){
                $msg.='<p>'.$value.'</p>';
            }

            return redirect()->back()->with('flash_error',$msg)->withInput();

        }

        $category = Category::findOrFail($request->id);
        $category->name = $request->name;

        if ($category->save()){
            return back()->with('flash_info','Drug category has been updated successfully');
        }
    }

    public function drug_type(){
        $data['page_title'] = "All Drug Type";
        return view('admin.drug-type',$data);
    }

    public function update_drug_type(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|min:3|max:200'
        ]);

        if ($validator->fails()){

            $msg = (count($validator->errors()->all()) == 1) ? 'An error occurred' : 'Some error(s) occurred';

            foreach ($validator->errors()->all() as $value){
                $msg.='<p>'.$value.'</p>';
            }

            return redirect()->back()->with('flash_error',$msg)->withInput();

        }

        $drug_type = Drug_type::findOrFail($request->id);
        $drug_type->name = $request->name;

        if ($drug_type->save()){
            return back()->with('flash_info','Drug type has been updated successfully');
        }
    }

    public function create_new_drug_type(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|unique:drug_type|min:3|max:200'
        ]);

        if ($validator->fails()){

            $msg = (count($validator->errors()->all()) == 1) ? 'An error occurred' : 'Some error(s) occurred';

            foreach ($validator->errors()->all() as $value){
                $msg.='<p>'.$value.'</p>';
            }

            return redirect()->back()->with('flash_error',$msg)->withInput();

        }

        $drug_type = new Drug_type([
            'name'=>$request->name
        ]);

        if ($drug_type->save()){
            return back()->with('flash_info','Drug type has been added successfully');
        }
    }

    public function edit_drug_type(Drug_type $drug_type){
        $data['page_title'] = "Edit Drug Type";
        $data['category'] = $drug_type;
        return view('admin.edit-drug-type',$data);
    }

    public function drug_products(){
        $data['page_title'] = "All Drug Products";
        return view('admin.drug-products',$data);
    }

    public function create_new_drug_product(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|unique:products|min:3|max:200',
            'drug_category'=>'required',
            'drug_type'=>'required',
            'measurement'=>'required',
            'price'=>'required',
            'drug_description'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png|max:1024'
        ]);

        if ($validator->fails()){

            $msg = (count($validator->errors()->all()) == 1) ? 'An error occurred' : 'Some error(s) occurred';

            foreach ($validator->errors()->all() as $value){
                $msg.='<p>'.$value.'</p>';
            }

            return redirect()->back()->with('flash_error',$msg)->withInput();

        }

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $image = time().$file->getClientOriginalName();
            $file->move(public_path('assets/images/'),$image);
        }

        $products = new Products([
            'image'=>$image,
            'name'=>$request->name,
            'price'=>$request->price,
            'category_id'=>$request->drug_category,
            'drug_type_id'=>$request->drug_type,
            'measurement'=>$request->measurement,
            'description'=>$request->drug_description,
        ]);

        if ($products->save()){
            return back()->with('flash_info', 'Product has been added successfully');
        }
    }

    public function edit_product(Products $products){
        $data['page_title'] = "Edit Product";
        $data['product'] = $products;
        return view('admin.edit-product',$data);
    }

    public function update_drug_product(Request $request){

        $validator = Validator::make($request->all(),[
            'name'=>'required|min:3|max:200',
            'drug_category'=>'required',
            'drug_type'=>'required',
            'price'=>'required',
            'measurement'=>'required',
            'drug_description'=>'required'
        ]);

        if ($validator->fails()){

            $msg = (count($validator->errors()->all()) == 1) ? 'An error occurred' : 'Some error(s) occurred';

            foreach ($validator->errors()->all() as $value){
                $msg.='<p>'.$value.'</p>';
            }

            return redirect()->back()->with('flash_error',$msg)->withInput();

        }

        $product = Products::findOrFail($request->id);
        $product->name =$request->name;
        $product->category_id = $request->drug_category;
        $product->drug_type_id = $request->drug_type;
        $product->measurement = $request->measurement;
        $product->price = $request->price;
        $product->description =$request->drug_description;

        if ($product->save()){
            return back()->with('flash_info','Product has been update successfully');
        }
    }

    public function inventory(){
        $data['page_title'] = "Inventory";
        return view('admin.inventory',$data);
    }

    public function create_new_inventory(Request $request){
        $validator = Validator::make($request->all(),[
            'product_name'=>'required',
            'quantity'=>'required',
            'nafdac_number'=>'required',
            'manufacturer_date'=>'required',
            'batch_number'=>'required',
            'expiry_date'=>'required'
        ]);

        if ($validator->fails()){

            $msg = (count($validator->errors()->all()) == 1) ? 'An error occurred' : 'Some error(s) occurred';

            foreach ($validator->errors()->all() as $value){
                $msg.='<p>'.$value.'</p>';
            }

            return redirect()->back()->with('flash_error',$msg)->withInput();

        }

        $inventory = new Inventory([
            'product_id'=>$request->product_name,
            'quantity'=>$request->quantity,
            'expiry_date'=>$request->expiry_date,
            'remark'=>$request->remark,
            'nafdac_number'=>$request->nafdac_number,
            'batch_number'=>$request->batch_number,
            'manufacturer_date'=>$request->manufacturer_date
        ]);

        if ($inventory->save()){
            return back()->with('flash_info','Product Inventory has been added successfully');
        }

    }

    public function edit_inventory(Inventory $inventory){
        $data['page_title'] = "Edit Inventory";
        $data['inventory'] =  $inventory;
        return view('admin.edit-inventory',$data);
    }

    public function update_inventory(Request $request){
        $validator = Validator::make($request->all(),[
            'product_name'=>'required',
            'quantity'=>'required',
            'nafdac_number'=>'required',
            'manufacturer_date'=>'required',
            'batch_number'=>'required',
            'expiry_date'=>'required'
        ]);

        if ($validator->fails()){

            $msg = (count($validator->errors()->all()) == 1) ? 'An error occurred' : 'Some error(s) occurred';

            foreach ($validator->errors()->all() as $value){
                $msg.='<p>'.$value.'</p>';
            }

            return redirect()->back()->with('flash_error',$msg)->withInput();

        }

        $inventory = Inventory::find($request->id);
        $inventory->product_id = $request->product_name;
        $inventory->quantity = $request->quantity;
        $inventory->remark = $request->remark;
        $inventory->expiry_date = $request->expiry_date;
        $inventory->nafdac_number = $request->nafdac_number;
        $inventory->manufacturer_date = $request->manufacturer_date;
        $inventory->batch_number = $request->batch_number;

        if ($inventory->save()){
            return back()->with('flash_info','Product inventory has been updated successfully');
        }
    }

    public function obtain(){
        $data['page_title'] = "Sales";
        return view('admin.obtain',$data);
    }

    public function expired(){
        $data['page_title'] = "All Expired Drug Inventory";
        return view('admin.expired',$data);
    }

    public function create_obtain_drug(Request $request){
       $validator = Validator::make($request->all(),[
           'customer'=>'required',
           'quantity'=>'required',
           'inventory'=>'required',
           'drug_usage'=>'required'
       ]);

        if ($validator->fails()){

            $msg = (count($validator->errors()->all()) == 1) ? 'An error occurred' : 'Some error(s) occurred';

            foreach ($validator->errors()->all() as $value){
                $msg.='<p>'.$value.'</p>';
            }

            return redirect()->back()->with('flash_error',$msg)->withInput();

        }

        $inventory = $request->inventory;
        $quantity = $request->quantity;
        $student_id = $request->customer;
        $drug_usage = $request->drug_usage;

        $user = User::find($student_id);

        for ($i =0; $i < count($quantity); $i++){
            $inventory_id = $inventory[$i];
            $quantities = $quantity[$i];

            $inventory_data = Inventory::find($inventory_id);
            $stock_quantity = $inventory_data->quantity;
            $remaining = $stock_quantity - $quantities;
            $drug_usages = $drug_usage[$i];

            $inventory_data->quantity = $remaining;
            $inventory_data->save();

            $sales = new Sales([
                'student_id'=>$student_id,
                'quantity'=>$quantities,
                'inventory_id'=>$inventory_id,
                'drug_usage'=>$drug_usages
            ]);

            $sales->save();

        }

        return back()->with('flash_info',strtoupper($user->matric_number)." drug has been obtained successfully");

    }

    public function drug_obtained(){
        $data['page_title'] = "All Sales Products";
        return view('admin.drug-obtained',$data);
    }
}
