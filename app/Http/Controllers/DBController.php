<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class DBController extends Controller
{
    public function insert(){
        $result = DB::insert('INSERT INTO products(name,image,price) VALUES(:name,:image,:price)',[
              'image'=>'https://via.placeholder.com/160',
               'name'=>'Product 1',
               'price'=>94
          ]);
        var_dump($result);
   }

   public function read(){
       //   $productData =   DB::select('SELECT * FROM products');
       //   return view('database.read',['products'=>$productData]);
       $productData =   DB::select('SELECT * FROM products WHERE id=:id',['id'=>2]);
       echo '<pre>';
       var_dump($productData);
   }

    public function update(){
        $result = DB::update('UPDATE products SET price=100 WHERE id = :id',['id'=>2]);
        echo '<pre>';
        print_r($result);
    }


    public function delete(){
        $result = DB::delete('DELETE FROM products WHERE id=:id',['id'=>2]);
        echo '<pre>';
        print_r($result);
    }


    public function execute_multiple_query(){
     DB::transaction(function(){
          DB::update('UPDATE products SET price =33 WHERE id=:id',['id'=>1]);
          DB::insert('INSERT INTO products(name,image,price) VALUES(:name,:image,:price)',[
           'image'=>'https://via.placeholder.com/160',
            'name'=>'Product 3',
            'price'=>44
       ]);
     });
}


    public function muliple_connection_database(){
        $result1=  DB::connection('mysql')->select('SELECT * FROM products');
        $result =  DB::connection('mysql2')->select('SELECT * FROM emp');
        echo '<pre>';
        print_r($result);
        print_r($result1);
    }

    public function showDashboard(){
        $productData =   DB::select('SELECT * FROM products');
        return view('company.read',['products'=>$productData]);
    }


    public function saveRecord(Request $request){
            DB::insert('INSERT INTO products(name,image,price) VALUES(:name,:image,:price)',[
                'image'=>$request->image,
                'name'=>$request->name,
                'price'=>$request->price
            ]);


            return redirect('/dashboard')->with('status','data added successfully');


    }


    public function workWithQueryBuilder(){
        # Insertion
              DB::table('products')->insert(
                   [
                          [
                                'image'=>'https://via.placeholder.com/160',
                                'name'=>'Product 11',
                                'price'=>98
                          ],
                          [
                                'image'=>'https://via.placeholder.com/160',
                                'name'=>'Product 12',
                                'price'=>23
                          ]
                   ]
           );
              echo '<h4>Record added successfully';


    }

    public function workWithQueryBuilderReading(){
        # Retrieve all Records
        // $products =  DB::table('products')->get();
        // echo  '<pre>';
        // print_r($products);


        # Retrieve the first record
            // $products =  DB::table('products')->first();
            // echo  '<pre>';
            // print_r($products);


        # Retrieve the 3rd record
            // $products =  DB::table('products')->find(3);
            // echo  '<pre>';
            // print_r($products);


        # Retrieve the image of product based on the name
            $products =  DB::table('products')->where('name','Product 5')->value('image');
            echo  '<pre>';
            print_r($products);
    }

    public function workWithQueryBuilderUpdate(){
        DB::table('products')->where('id','=',1)->update(['name'=>'shoe']);
        $products =  DB::table('products')->get();
        echo  '<pre>';
        print_r($products);
    }

    public function workWithQueryBuilderDelete(){
        DB::table('products')->where('id','=',1)->delete();
        $products =  DB::table('products')->get();
        echo  '<pre>';
        print_r($products);
    }

    public function workWithSchemaBuilder(){
        # Creating Table with Column
                //  Schema::create('students',function(Blueprint $table){
                //     $table->increments('id');
                //     $table->string('Name',60);
                //     $table->string('Email');
                //     $table->string('Password');
                //  });


        # Updating Table
                //   Schema::table('students', function(Blueprint $table){
                //              $table->text('comment');
                //              $table->boolean('isAdmin');
                //              $table->date('dob');
                //   });

        # Rename Table
            //   Schema::rename('students','persons');


        # Drop Table column
            //   Schema::table('persons', function(Blueprint $table){
            //         $table->dropColumn('isAdmin');


            //   });


         # Drop Table
               //      Schema::drop('persons');


         # Create or Modify table with the context of Database connection
        //   Schema::connection('mysql')->create('students', function(Blueprint $table){
        //     $table->increments('id');
        //         $table->string('Name',60);
        //         $table->string('Email');
        //         $table->string('Password');
        //   });
          Schema::connection('mysql2')->table('students', function(Blueprint $table){
                //  $table->increments('id');
                // $table->string('Name',60);
                // $table->string('Email');
                $table->boolean('IsAdmin');
          });

    }


}
