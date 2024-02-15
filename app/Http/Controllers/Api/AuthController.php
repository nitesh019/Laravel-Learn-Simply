<?php

namespace App\Http\Controllers\Api;

use bcrypt;
use response;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function register1(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> bcrypt($request->password)
        ]);

        $token =  Auth::login($user);

        return \response()->json([
            'meta'=>[
                'code'=>200,
                'status'=>'success',
                'message'=>'User created successfully'
            ],
            'data'=>[
                'user'=>$user,
                'access_token'=>[
                    'token'=>$token,
                    'type'=>'Beare'
                ]
            ]
        ]);
    }


    public function login1(Request $request){

        $request->validate([
            'name'=>'required',
            'password'=>'required'
        ]);

        # attempt a login
        $token = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if($token){
            return \response()->json([
                'meta'=>[
                    'code'=>200,
                    'status'=>'success',
                    'message'=>'Qoute created successfully'
                ],
                'data'=>[
                    'user'=>Auth::user,
                    'access_token'=>[
                        'token'=>$token,
                        'type'=>'Bearer'
                    ]
                ]
            ]);

        }

    }

    public function logout1(){

        Auth::logout();

        return response()->json([
            'status'=>'sucesss',
            'message'=>'logout successfuly'
        ]);
    }


    public function register(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);


        $user = User::create([
              'name'=> $request['name'],
              'email'=>$request['email'],
              'password'=>bcrypt($request['password'])
        ]);


        # login the user immediately and generate the token
        $token = Auth::login($user);


        # return response as json
        return response()->json([
              'meta' =>[
                   'code'=>200,
                   'status'=>'success',
                   'message'=> 'User created successfully'
              ],
              'data'=>[
                    'user'=>$user,
                    'authorization'=>[
                        'token'=>$token,
                        'type'=> 'Bearer'
                    ]
              ]
        ]);


   }


   public function login(Request $request){

            $request->validate([
                 'email'=>'required',
                 'password'=>'required'
             ]);


            # attempt a login
           $token= Auth::attempt([
               'email'=>$request->email,
               'password'=>$request->password
            ]);


          if($token){
             return response()->json([
                 'meta' =>[
                      'code'=>200,
                      'status'=>'success',
                      'message'=> 'User Login successfully'
                 ],
                 'data'=>[
                       'user'=>Auth::user(),
                       'authorization'=>[
                           'token'=>$token,
                           'type'=> 'Bearer'
                       ]
                 ]
           ]);
          }
   }


   public function logout(){
        Auth::logout();
        return response()->json([
            'status'=>'success',
            'message'=>'Successfully logged out'
        ]);
   }

}
