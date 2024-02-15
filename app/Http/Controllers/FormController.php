<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomFormRequest;

class FormController extends Controller
{
    public function formSubmit(Request $request){
        dd($request->toArray());
    }
    public function processFormData(Request $request){
        # Collect all Input Data
           $userInput = $request->all();
           echo '<pre>';
           var_dump($userInput);
die;

       # Collect Individual Form Field
           // $userInput = $request->input('username');
           // echo '<pre>';
           // var_dump($userInput);




       # Collect only few fields
           // $userInput = $request->only(['username','password']);
           // echo '<pre>';
           // var_dump($userInput);


           // $userInput = $request->except(['_token']);
           // echo '<pre>';
           // var_dump($userInput);


       # Check the existence of Field


       // if($request->has('username')){
       //     $userInput = $request->all();
       //     echo '<pre>';
       //     var_dump($userInput);
       // }


       # Working with Old Data
       // $request->flash();
       // // $request->flashExcept('_token');
       // // $request->flashOnly('username','password');
       // return redirect('/oldData');


       #Working with File Upload


       $userInput = $request->file('book');
       echo '<pre>';
       var_dump($userInput->path());
       var_dump($userInput->extension());




   }


   public function workWithOldData(FormLoginRequest $request){
           # Collect old Data
               // $userInput = $request->old();
               // echo '<pre>';
               // var_dump($userInput);
   }

   public function workWithFormBuilder(CustomFormRequest $request){

          $userInput = $request->all();
          echo '<pre>';
          var_dump($userInput);
    }


}
