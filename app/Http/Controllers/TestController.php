<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Gate;

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

    public function show(){
        if(!Gate::denies('is_user')){
            abort(403);
        }  

        dd('inside show method');
    }

    public function delete(){  
        if(!Gate::allows('is_admin')){
            abort(403);
        }  
  
        dd('inside delete method');
    }

    public function edit(Post $post){
          $this->authorize('update',$post);
          return 'You can edit this post';
    }

    public function debug(){

    //  $data =  User::all();
        // $data =  User::all()->toArray();
        // $data = User::toSql();
        // $data = User::Where('name','peter')->toSql();
        // $data = User::Where('name','peter')->get();
        // $data = User::Where('name','peter')->dd();
        // $data = User::Where('name','peter')->orWhere('email','peter@gmail.com')->dd();
        //  dd($data);


        // ------Another way-----------
        // DB::enableQueryLog();
        // $data = User::Where('name','peter')->orWhere('email','peter@gmail.com')->get();
        // dd(DB::getQueryLog());


        // ------Using Debugger library----------
        $data = User::all();
        return view('test',['data'=>$data]);
    }



}
