<?php

namespace App\Http\Controllers;

use App\Unit;
Use Alert;
use Session;
use Illuminate\Http\Request;
class UnitController extends Controller
{
    
    public function index(){

        $units = Unit::with([])->paginate(6);
        $paginationState = true;
        return view('units.units')->with([
            'units' => $units,
            'pagState' => $paginationState,
            ]);
    }

    public function unitCheckDuplicate($unit){
        $unitt = Unit::where('unit_name','=',$unit)->orWhere('unit_code','=',$unit)->first();

        if(!is_null($unitt)){
            Session::flash('status','Unit Name or Code Is Already Exists');
            return false;
        }
        return true;
    }


    public function store(Request $request){

        $request->validate([
            'add_unit_name' => 'required',
            'add_unit_code' => 'required',
        ]);

        $unit_name = $request->input('add_unit_name');
        $unit_code = $request->input('add_unit_code');

        if(!$this->unitCheckDuplicate($unit_name)){
            return redirect()->back();
        }
        if(!$this->unitCheckDuplicate($unit_code)){
            return redirect()->back();
        }

        $unit = new Unit();
        $unit->unit_name = $unit_name;
        $unit->unit_code = $unit_code;
        $unit->save();

        Session::flash('status','Unit Created !');

        return redirect()->back();

    }

    public function update(Request $request){
        $request->validate([
            'unit_name_modal' => 'required',
            'unit_code_modal' => 'required',
        ]);

        $id       = $request->input('unit_id_modal');
        $unitName = $request->input('unit_name_modal');
        $unitCode = $request->input('unit_code_modal');

        if(!$this->unitCheckDuplicate($unitName)){
            return redirect()->back();
        }
        if(!$this->unitCheckDuplicate($unitCode)){
            return redirect()->back();
        }

        $unit = Unit::findOrFail($id);
        $unit->unit_name = $unitName;
        $unit->unit_code = $unitCode;
        $unit->save();

        Session::flash('status','Unit Updated !');

        return redirect()->back();

        
    }


    public function delete(Request $request){
         $id = $request->input('unit_id_delete');

         $unit = Unit::findOrFail($id);

         $unit->delete();

         Session::flash('status','Unit Deleted !');

         return redirect()->back();
    }

    public function search(Request $request){
        $paginationState = false;
        $request->validate([
            'unit_name_search' => 'required',
        ]);

        $searchunit = $request->input('unit_name_search');

        $unit = Unit::where('unit_name','like','%'.$searchunit.'%')->orWhere('unit_code','like','%'.$searchunit.'%')->get();
        if(count($unit)>0){
            return view('units.units')->with([
                'units' => $unit,
                'pagState' => $paginationState,
                ]);
        }
        $request->session()->flash('status','This Unit Not Found !');
        return redirect()->route('units');
    }
}
