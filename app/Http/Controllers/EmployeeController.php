<?php

namespace App\Http\Controllers;


use App\Models\Employee;
use App\Models\Sub_employee;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Middleware\UserRedirectAuthenticate;
use App\http\UserTrait;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class EmployeeController extends Controller
{
    use UserTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function employeeList(Request $request)
    {

        if ($request->ajax()) {
            $data = Employee::get();
            return FacadesDataTables::of($data)->addIndexColumn()

                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-primary edit_btn">Edit</a> 
                    
                    <button class="btn btn-danger delete_btn" data-id="' . $row->id . '">Delete</button>';
                    return $btn;
                })
                ->addColumn('image', function ($row) {
                    $image = '<img src="/storage/photos/' . $row->image . '" width="50" height="50">';
                    return $image;
                })
                ->addColumn('sub_emp_id', function ($row) {
                    return @$row->getSubEmployee->se_name;
                })
                ->rawColumns(['action', "image"])
                ->make(true);
        }

        $semp  =  Sub_employee::get();
        return view("employee.employeeList", compact("semp"));
    }
    public function storeEmployee(Request $request)
    {
        dd($request->all());
        // $validated = $request->validate([
        //     'f_name' => 'required',
        //     'l_name' => 'required',
        //     'email' => 'required|unique:employees',
        // ]);

        // muti img show

        $validator = Validator::make($request->all(), [
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|unique:employees',
            'sub_emp_id' => 'required',
            'gender' => 'required',
            'hobby' => 'required',
            'image' => 'required',
        ],[
            'f_name.required'=>"First Name is required", 
            'l_name.required'=>"Last Name is required", 
            'email.required'=>"Email is required", 
            'sub_emp_id.required'=>"Sub employee is required", 
            'gender.required'=>"Gender is required", 
            'hobby.required'=>"Hobby is required", 
            'image.required'=>"Image is required", 
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(["error" => $errors, "status" => "0"]);
        }

        // $emp = new Employee();
        // $emp->f_name = $request->f_name;
        // $emp->l_name = $request->l_name;
        // $emp->email = $request->email;
        // $emp->save();
        //dd($request);

        Employee::create([

            $name = $request->file("image")->getClientOriginalName(),
            Storage::disk('public')->putFileAs('photos', new File($request->file("image")), $name),

            "f_name" => $request->f_name,
            "l_name" => $request->l_name,
            "email" => $request->email,
            "sub_emp_id" => $request->sub_emp_id,
            "gender" => $request->gender,
            "hobby" => @implode(",", $request->hobby),
            "image" => $name,
            //"u_id" => $request->user()->id,
        ]);

        // Employee::create($request->all());
        return response()->json(["msg" => "Data insert successfully"]);
        // return redirect()->route("employeeList")->with("msg", "Data insert successfully");
    }
    public function editEmployee(Request $request)
    {
        $emp  =  Employee::find($request->id);
        $hobby = explode(",", $emp->hobby);
        return response()->json(["msg" => "success", "emp" => $emp, "hobby" => $hobby]);
    }

    public function updateEmployee(Request $request)
    {
        // dd($request->all());
        // $validated = $request->validate([
        //     'f_name' => 'required',
        //     'l_name' => 'required',
        //     'email' => 'required|unique:employees,email,' . $request->id,

        // ]);

        if ($request->file('image')) {
            $name = $request->file("image")->getClientOriginalName();
            Storage::disk('public')->putFileAs('photos', new File($request->file("image")), $name);
            Employee::where("id", $request->id)->update([
                "image" => $name
            ]);
        }
        Employee::where("id", $request->id)->update([
            "f_name" => $request->f_name,
            "l_name" => $request->l_name,
            "email" => $request->email,
            "gender" => $request->gender,
            "sub_emp_id" => $request->sub_emp_id,
            "hobby" => implode(",", $request->hobby),
        ]);

        return response()->json(["msg" => "Data Update Successfully"]);
        // return response()->json([["msg"=> "Data update successfully"]]);
        // return redirect()->route("employeeList")->with("msg", "Data update successfully");
    }

    public function deleteEmployee(Request $request)
    {
        $emp  =  Employee::find($request->emp_id);
        if ($emp) {
            $emp->delete();
            return response()->json(["msg" => "Data Delete Successfully"]);
        } else {
            return response()->json(["msg" => "some error"]);
        }

    }
}
