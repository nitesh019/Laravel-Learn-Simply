<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BladeController extends Controller
{
    //
    public function showLoginIngo($username,$password){
        return view('bladeDemo')
              ->with(['user'=>$username,'pass'=>$password]);
  }


  public function showUserRole($role){
     return view('bladeDemo')->with('role',$role);
  }


  public function showGrade($score){
      return view('bladeDemo')->with('score',$score);
  }


  public function showEmployeeList(){
      $users = ['Mike','Peter','Rose','Kerry'];
      return view('bladeDemo')->with('empRecords',$users);
  }


  public function showHomePage(){
    return view('layout.home');
  }

  public function showContactPage(){
    return view('layout.contact');
  }

}
