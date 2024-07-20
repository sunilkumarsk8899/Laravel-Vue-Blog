<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;

class GlobalController extends Controller
{
    public function register(Request $request){
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('pass')),
        ]);
        if($user){
            return response()->json([
                'data' => $user,
                'msg' => 'User Register Successfully',
                'status' => true
            ],200);
        }else{
            return response()->json([
                'data' => $user,
                'msg' => "Somthing We'nt wrong",
                'status' => false
            ],400);
        }
    }

    public function login(Request $request){
        $user = User::where('email', $request->input('email'))->first();

        if ($user) {
            // Check if the provided password matches the stored hashed password
            if (Hash::check($request->input('password'), $user->password)) {
                // Authentication successful
                $token = $user->createToken('jwt-blog-vue')->plainTextToken;
                return response()->json([
                    'token' => $token,
                    'user' => $user,
                    'status' => true,
                    'message' => 'Login successful'
                ], 200);
            } else {
                // Authentication failed - incorrect password
                return response()->json([
                    'user' => null,
                    'status' => false,
                    'message' => 'Invalid password'
                ]);
            }
        } else {
            // User not found
            return response()->json([
                'user' => null,
                'status' => false,
                'message' => 'User not found'
            ]);
        }
    }

    public function profile_update(Request $request){
        $user = User::find($request->input('id'));
        $currPassInvalid = false;
        $is_save = false;
        if (!Hash::check($request->input('curr_pass'), $user->password))
        {
            $currPassInvalid = true;
        }

        if($currPassInvalid == false){
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('conf_pass'));
            $user->save();
            $is_save = true;
        }
        return response()->json([
            'user' => $user,
            'id' => $request->input('id'),
            'request_data' => $request->all(),
            'currPassInvalid' => $currPassInvalid,
            'is_save' => $is_save
        ]);
    }
}
