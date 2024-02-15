<?php

namespace App\Http\Controllers\Api;

use response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function userDetails1(){
        return response()->json([

            'meta'=>[
                'code'=>200,
                'status'=>'success',
                'message'=>'user fetched successfully'
            ],
            'data'=>[
                'user'=>Auth::user,
            ]
        ]);
    }

    public function userDetails(){

        return response()->json([
            'meta' =>[
                 'code'=>200,
                 'status'=>'success',
                 'message'=> 'User fetched successfully'
            ],
            'data'=>[
                  'user'=>Auth::user(),

            ]
      ]);
    }

}
