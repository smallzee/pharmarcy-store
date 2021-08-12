<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Drug_type;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(){
        $data['page_title'] = "Dashboard";

        $data['total_admin'] = User::where('role_id','>',1)->count();
        $data['total_drug_type'] = Drug_type::count();
        $data['total_drug_category'] = Category::count();

        return view('admin.dashboard',$data);
    }

    public function users(){
        $data['page_title'] = "All Admin";
        return view('admin.users',$data);
    }

    public function create_new_user(Request $request){

        $validator = Validator::make($request->all(),[
            'email_address'=>'required|unique:users|min:8|max:200',
            'full_name'=>'required',
            'phone_number'=>'required',
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

        $user = new User();
        $user->image = $image;
        $user->email_address = $request->email_address;
        $user->full_name = $request->full_name;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);

        if ($user->save()){
            return back()->with('flash_info','Admin has been added successfully');
        }
    }
}
