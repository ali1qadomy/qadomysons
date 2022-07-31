<?php

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $uservalidation = $request->all();
        $valid = validator::make($uservalidation, [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',

        ]);
        if ($valid->fails()) {
            return Response()->json([
                "message" => "all filed are required",
                "status" => false
            ]);
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->branche_id = $request->branche_id;
            $user->save();
            $success['token'] = $user->createToken('myapp')->accessToken;
            return response()->json([
                'Token' => $success['token'],
                'message' => 'succsfull registeration',
                'status' => true
            ]);
        }
    }
    public function login(Request $request)
    {
        $uservalid = $request->all();
        $validate = validator::make($uservalid, [
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'username or password are required'
            ]);
        } else {
            if (Auth::guard('web')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ])) {
                $user = Auth::guard('web')->user();
                $success['token'] = $user->createToken('myApp')->accessToken;
                return response()->json([
                    'data' => $user,
                    'token' => $success['token'],
                    'status' => true,
                    'message' => 'welcome you are loggin '
                ]);
            }
        }
    }
}
