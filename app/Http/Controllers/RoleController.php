<?php

namespace App\Http\Controllers;

use App\Role;
use Session;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    
    public function index(){

        $roles = Role::with([])->paginate(6);
        $paginationState = true;
        return view('roles.roles')->with([
            'roles' => $roles,
            'pagState' => $paginationState,
            ]);
    }

    public function roleCheckDuplicate($role_name){
        $rolee = Role::where('role','=',$role_name)->first();

        if(!is_null($rolee)){
            Session::flash('status','Role Already Exists');
            return false;
        }
        return true;
    }


    public function store(Request $request){

        $request->validate([
            'add_role_name' => 'required',
        ]);

        $role_name = $request->input('add_role_name');
     

        if(!$this->roleCheckDuplicate($role_name)){
            return redirect()->back();
        }
  
        $role = new Role();
        $role->role = $role_name;
        $role->save();

        Session::flash('status','Role Created !');

        return redirect()->back();

    }

    public function update(Request $request){
        $request->validate([
            'role_name_modal' => 'required',
            
        ]);

        $id       = $request->input('role_id_modal');
        $roleName = $request->input('role_name_modal');
     

        if(!$this->roleCheckDuplicate($roleName)){
            return redirect()->back();
        }


        $role = Role::findOrFail($id);
        $role->role = $roleName;
        $role->save();

        Session::flash('status','Role Updated !');

        return redirect()->back();

        
    }


    public function delete(Request $request){
         $id = $request->input('role_id_delete');

         $role = Role::findOrFail($id);

         $role->delete();

         Session::flash('status','Role Deleted !');

         return redirect()->back();
    }

    public function search(Request $request){
        $paginationState = false;
        $request->validate([
            'role_name_search' => 'required',
        ]);

        $searchrole = $request->input('role_name_search');

        $role = Role::where('role','like','%'.$searchrole.'%')->get();
        if(count($role)>0){
            return view('roles.roles')->with([
                'roles' => $role,
                'pagState' => $paginationState,
                ]);
        }
        $request->session()->flash('status','This Role Not Found !');
        return redirect()->route('roles');
    }
}
