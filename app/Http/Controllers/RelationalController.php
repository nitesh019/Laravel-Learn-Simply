<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Actor;
use App\Models\Brand;
use App\Models\Movie;
use Illuminate\Http\Request;

class RelationalController extends Controller
{
    public function showOneToOneRelation(){
        $users = User::all();
        foreach($users as $u){
            echo "<p>
                    <strong>".$u->name."</strong>
                     <span>has birthplace country name</span>
                     <strong>". $u->country->country_name ?? null ."</strong>
                  </p>";
        }
    }

    public function showOneToMany(){
         $users =  User::all();
        foreach($users as $u){
            echo '<p><strong>'. $u->name.'</strong> is using following email accounts</p>';


            foreach($u->account as $acc){
            echo '<li>'.$acc->account_name.'</li>';
            }
        }
    }

    public function showOneToManyProduct(){
        $brands =  Brand::all();
        return view('product',['brand'=>$brands]);
   }

    public function showOneToManyPractice(){
        $brands =  Brand::all();
        echo '<table border="1">
            <thead>
                    <tr>
                            <th>No</th>
                            <th>Brand</th>
                            <th>Product</th>
                            <th>Product Count</th>
                    </tr>
            </thead>
                    ';
                    $no = 1;
                    foreach($brands as $brand){
                            echo '<tr>
                                <td>'.$no++.'</td>
                                <td>'.$brand->brand_name.'</td>
                                <td>

                                ';
                                foreach($brand->product as $p){
                                    echo $p->name;
                                }

                            echo '</td>
                                <td>'.$brand->product->count().'</td>
                            </tr>';
                    }
                    echo '</table>';

    }

    public function ManyToMany(){
        $users = User::all();
        foreach($users as $u){
              echo '<p><strong>'.$u->name.'</strong> has following roles: -</p>';
              foreach($u->role as $r){
                 echo  '<li>'.$r->role.'</li>';
              }
        }
        echo '<hr>';
        $roles = Role::all();
        foreach($roles as $r){
              echo '<p><strong>'.$r->role.'</strong> is assigned to';
              foreach($r->user as $u){
                 echo  '<li>'.$u->name.'</li>';
              }
              echo '</p>';
        }

    }

    public function ManyToManyPractice(){

        $actors = Actor::all();
        foreach($actors as $act){
              echo '<p><strong>'.$act->name.'</strong> has work on following movies: -</p>';

              foreach($act->movie as $m){
                 echo  '<li>'.$m->name.'</li>';
              }
        }
        echo '<hr>';
        $movies = Movie::all();
        foreach($movies as $m){
              echo '<p><strong>'.$m->name.'</strong> in movie below actor works ';
              foreach($m->actor as $a){
                 echo  '<li>'.$a->name.'</li>';
              }
              echo '</p>';
        }

    }

}
