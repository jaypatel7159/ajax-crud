<?php

namespace App\Http\Controllers;
use App\Models\Sub_employee;
use Illuminate\Http\Request;

class SubEmployeeController extends Controller
{
    public function subEmployee(){
        $semp['semp']  =  Sub_employee::get();
        return view("subemployee.subEmployee",$semp);
    }

    public function addsubEmployee(Request $reqest){

        Sub_employee::create([
            "se_name"=> $reqest->se_name,
        ]);

        return redirect()->route("subEmployee");
    }

    public function editsubEmployee($id){
        $semp['semp']  =  Sub_employee::find($id); 

        return view("subemployee.subEmployeeedit",$semp);
    }

    public function updatesubEmployee(Request $request){

        Sub_employee::where("id",$request->id)->update([
            "se_name"=> $request->se_name,
            
        ]);
        return redirect()->route("subEmployee");
    }

    public function deletesubEmployee($id){
        $semp  =  Sub_employee::find($id);
        $semp->delete();
        return redirect()->route("subEmployee");
    }
}
