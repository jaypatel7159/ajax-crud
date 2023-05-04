<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Validator as FacadesValidator;

class PassportAuthController extends Controller
{
    /**
     * Registration
     */
    public function register(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'f_name' => 'required|min:4',
            // 'l_name' => 'required|min:4',
            // 'email' => 'required|email',
            // 'password' => 'required|min:8',
        ]);

        if($validator->fails()){
            return response()->json([$validator->errors()]);
        }
 
        $user = User::create([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
       
        $token = $user->createToken('AuthApp')->accessToken;
 
        return response()->json(['token' => $token], 200);
    }
 
    /**
     * Login
     */
    public function login(Request $request)
    {

        $validator = FacadesValidator::make($request->all(), [
            // 'f_name' => 'required|min:4',
            // 'l_name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if($validator->fails()){
            return response()->json(['error' => 'Unauthorised'], 401);
        }

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('AuthApp')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }   
}