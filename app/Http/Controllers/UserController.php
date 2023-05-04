<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function userRegister() {
        return view("user.register");
    }

    public function storeRegister(Request $request) {
        $validated = $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'password' => 'required|min:6',
            'c_password' => 'required|same:password|min:6',
            'email' => 'required|unique:users',
        ]);
        User::create([
            "f_name"=> $request->l_name,
            "l_name"=> $request->l_name,
            "email"=> $request->email,
            "password"=>  Hash::make($request->password),
            
        ]);
        return redirect()->route("userlogin")->with("msg","Register successfully");
    }
    public function userlogin() {

        return view("user.login");
    }
    
    public function checkLogin(Request $request){
        
        
        if ($data = User::where('f_name', $request->f_name)->orwhere("email",$request->f_name)->first()) {
            Session::put("id",$data->id);
            Session::put("f_name",$data->f_name);
            $pass = Hash::check($request->password, $data->password);
            if ($pass) {
                return redirect()->route("employeeList")->with("log","Login successfully");
            } else {
                return redirect()->route("userlogin")->with("pass","Password not valid");
            }
        } else {
            return redirect()->route("userlogin")->with("uname","UserName not valid"); 
        }
    }
    public function userLogout() {
    
        Auth::guard('web')->logout();

        return redirect("login");
    }


    public function userEdit($id) {

        // $emp  =  Employee::where("id",$id)->first();
        $user['user']  =  User::find($id); 
        
        //   $semp  =  Sub_employee::get();
        //return view("user.edituser",$user);
        return redirect("profile");
    }
    
}
