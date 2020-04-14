<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public $successStatus = 200;

    public function login(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            $user = Auth::user();
            $data['token'] = $user->createToken('AppToken')->accessToken;
            $data['message'] = 'Successfully Logged In';
            return response()->json(['success' => $data], $this->successStatus);
        } else {
            $data['message'] = 'Unauthorized';
            return response()->json(['error' => $data], 401);
        }
    }

    public function register(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirmPass' => 'required|same:password'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $req->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('AppToken')->accessToken;
        $success['name'] = $user->name;
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function logout()
    {
        // Auth::logout();
        Auth::user()->token()->revoke();
        $data['message'] = 'Successfully Logged Out';
        return response()->json(['success' => $data], $this->successStatus);
    }

    public function unauthorized()
    {
        return response()->json(['error' => ['message' => 'Unauthorized']]);
    }

}
