<?php

namespace App\Http\Controllers;

use App\User;
use Session;
use Illuminate\Http\Request;

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
}
