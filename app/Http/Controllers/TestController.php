<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TestController extends Controller
{
    public function hi(){
        hello();
    }

    public function testHelperCode(){
        return view('helper.helpercode');
    }

    public function index(){
            return view('test.search');
    }


    public function result(Request $request){
        # give us an error
        // $user =   User::find($request->user_id);
        // return view('result',compact('user'));

        # handle Error
        try{
            $user =  User::findOrFail($request->user_id);
            return view('test.result',compact('user'));
        }
        catch(Exception $e){
            $message = $e->getMessage();
            if($e instanceof ModelNotFoundException){
                $message = 'User with Id: '.$request->user_id.' not found';
            }
        }
        return back()->withError($message);


    }

}
