<?php

namespace App\Http\Controllers;

use Session;
use App\Role;
use App\User;
use App\Image;
use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $users = User::with(['shippingAddress','roles','billingAddress'])->paginate(6);
        $paginationState = true;
       
        
        // Session::flash('message','hello world !');
        return view('customers.customers')->with([
            'users' => $users,
            'pagState' => $paginationState,
        ]);
    }



    public function store(Request $request){
        $request->validate([
            'add_user_fname' => 'required',
            'add_user_lname' => 'required',
            'add_user_email' => 'required',
            'add_user_password' => 'required',
            'add_user_mobile' => 'required',
        ]);

        $firstName = $request->input('add_user_fname');
        $lastName = $request->input('add_user_lname');
        $email = $request->input('add_user_email');
        $password = $request->input('add_user_password');
        $mobile = $request->input('add_user_mobile');

        $user = new User();

        $user->first_name = $firstName;
        $user->last_name  = $lastName;
        $user->email      = $email;
        $user->password   = $password;
        $user->mobile     = $mobile;
        
        $user->save();

        Session::flash('message','User Added Successfully !');

        return redirect()->back();

    }

    public function delete(Request $request){
        // dd($request->all());
        $id = $request->input('user_id_delete');

        $user = User::findOrFail($id);

        $user->delete();

        Session::flash('message','User Deleted Successfully !');

        return redirect()->back();
   }


   public function search(Request $request){
        $paginationState = false;

        $request->validate([
            'user_search' => 'required',
        ]);

        $search = $request->input('user_search');

        $user = User::where('first_name','like','%'.$search.'%')
                      ->orWhere('email','like','%'.$search.'%')->get();
        
        if(count($user) > 0){
            Session::flash('message','We Found Some Results !');
            return view('customers.customers')->with([
                'users' => $user,
                'pagState' => $paginationState,
            ]);
        }else{
        Session::flash('message','Nothing Found !');
        return redirect()->route('users');
        }
   }


   public function profile($id){
    
    $user = User::findOrFail($id);
    $roles = Role::all();

    return view('customers.customers_profile')->with([
         'users' => $user,
         'roles' => $roles,
        ]);
    
   }


   public function update(Request $request){
        // dd($request->all());
        $id= $request->input('user_id');


        $request->validate([
            'first_name'     => 'required',
            'last_name'      => 'required',
            'email'          => 'required',
            'password'       => 'required',
            'mobile'         => 'required',
            'role-option'    => 'required',

            'streetName_s'   => 'required',
            'streetNumber_s' => 'required',
            'state_s'        => 'required',
            'city_s'         => 'required',
            'country_s'      => 'required',
            'postcode_s'    => 'required',    
            
            'streetName_b'   => 'required',
            'streetNumber_b' => 'required',
            'state_b'        => 'required',
            'city_b'         => 'required',
            'country_b'      => 'required',
            'postcode_b'    => 'required',   
        ]);


        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $password = $request->input('password');
        $mobile = $request->input('mobile');

        $street_name_s = $request->input('streetName_s');
        $street_number_s = $request->input('streetNumber_s');
        $state_s = $request->input('state_s');
        $city_s = $request->input('city_s');
        $country_s = $request->input('country_s');
        $post_code_s = $request->input('postcode_s');

        $street_name_b = $request->input('streetName_b');
        $street_number_b = $request->input('streetNumber_b');
        $state_b = $request->input('state_b');
        $city_b = $request->input('city_b');
        $country_b = $request->input('country_b');
        $post_code_b = $request->input('postcode_b');

        

        $user            = User::findOrFail($id);
        // $role            = Role::findOrFail($request->input('role-option'));
        $shippingAddress = $user->shippingAddress;
        $billingAddress  = $user->billingAddress;

        $newShippingAddress = new Address();
        $newBillingAddress  = new Address();
     

        $user->first_name = $first_name;
        $user->last_name  = $last_name;
        $user->email      = $email;
        $user->password   = $password;
        $user->mobile     = $mobile;
        $user->roles()->sync([$request->input('role-option')]);


        if(is_null($user->shipping_address)){
            //new instance
            $newShippingAddress->street_name   = $street_name_s;
            $newShippingAddress->street_number = $street_number_s;
            $newShippingAddress->state         = $state_s;
            $newShippingAddress->city          = $city_s;
            $newShippingAddress->country       = $country_s;
            $newShippingAddress->post_code     = $post_code_s;
            $newShippingAddress->save();

            $user->shipping_address = $newShippingAddress->id;

        }else{
            //update the current 
            $shippingAddress->street_name   = $street_name_s;
            $shippingAddress->street_number = $street_number_s;
            $shippingAddress->state         = $state_s;
            $shippingAddress->city          = $city_s;
            $shippingAddress->country       = $country_s;
            $shippingAddress->post_code     = $post_code_s;
            $shippingAddress->save();
        }

        if(is_null($user->billing_address)){
            //new instance
            $newBillingAddress->street_name   = $street_name_b;
            $newBillingAddress->street_number = $street_number_b;
            $newBillingAddress->state         = $state_b;
            $newBillingAddress->city          = $city_b;
            $newBillingAddress->country       = $country_b;
            $newBillingAddress->post_code     = $post_code_b;
            $newBillingAddress->save();

            $user->billing_address = $newBillingAddress->id;

        }else{
            //update the current
            $billingAddress->street_name   = $street_name_b;
            $billingAddress->street_number = $street_number_b;
            $billingAddress->state         = $state_b;
            $billingAddress->city          = $city_b;
            $billingAddress->country       = $country_b;
            $billingAddress->post_code     = $post_code_b;
            $billingAddress->save();
        }

        $user->save();

        Session::flash('message','Informations Updated Sccuessfully !');

        return redirect()->back();
   }


   public function uploadProfileImage(Request $request,$id){
        $user = User::findOrFail($id); 
        $file = $request->hasFile('file');

        if($file = $request->file('file'));

        $filename = uniqid(). '.' . $file->getClientOriginalExtension();
        $path = $file->StoreAs('public\images',$filename);

        if($path){  
            $user->profile_image = $filename;
            $user->save();
            Session::flash('message','Avatar Uploaded Successfully !');
        }else{
            Session::flash('Problem occurs while uploading new Avatar');
        }
        

        
   }
}
