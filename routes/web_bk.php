<?php

use App\Jobs\MyQueueMailJob;
use App\Jobs\EncodeVideoClip;
use App\Jobs\GenerateSubtitles;
use App\Jobs\PublishedVideoClip;
use App\Jobs\SendVerificationEmail;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DBController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BladeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ItemImportController;
use App\Http\Controllers\RelationalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

# localhost:8000 => Default Url
// Route::get('/', function () {
//     return view('sample');
// });

#pass data to view
// Route::get('/sample', function(){

//     return view('sample',['user'=>'Peter']);
//     # key will use as php variable in view file
// });

#another way of passing data
// Route::get('/sample', function(){
//     return view('sample')->with('user','Rose');
// });

# Pass Route Parameter to View
// Route::get('/login/{user}/{pass}',function($user,$pass){
//       return view('sample',['username'=>$user,'pass'=>$pass]);
// });

// -------------redirect()--------------------------

// Route::get('/login/{username}/{password}', function($username,$password){

//         if($username === 'admin'  && $password === 'admin'){
//               return redirect('/success');
//         }
//         else{
//                return redirect('/failure');
//         }
// });


// Route::get('/success', function(){
//       return 'Login Successfully';
// });
// Route::get('/failure',function(){
//       return 'Login Failed...';
// });

#------------------Passing data with redirect()---------------------
Route::get('/login/{username}/{password}', function($username,$password){

if($username === 'admin'  && $password === 'admin'){
      return redirect('/dashboard')->with('status','Login Successfully..');
}
else{
       return redirect('/dashboard')->with('status','Login Failed..');
}
});

Route::get('/dashboard', function(){
return view('sample');
});

#Middleware
#localhost:8000/checkAge/23
#localhost:8000/checkAge/11

// Route::get('/checkAge/{age}', function($age){
//    return "Given Age is $age  and can Vote";
// })->middleware(AgeMiddleware::class);


Route::get('/checkAge/{age}', function($age){
    return "Given Age is $age  and can Vote";
 })->middleware('age');


Route::get('/invalidAge',function(){
    return  session('age'). " - can not Vote";
});

Route::get('/test',[TestController::class,'showTestInfo']);
Route::get('/test/{testName}',[TestController::class,'PrintTest']);

Route::resource('/photo',PhotoController::class);

//  Route::view('/form','Form.form');
//  Route::post('/create', [FormController::class, 'formSubmit'])->name('formSubmit');

 Route::view('/form', 'Form.form');
 Route::post('/handleSubmit',[FormController::class,'processFormData']);
 Route::get('/oldData',[FormController::class,'workWithOldData']);

 Route::post('/handleFormBuilderSubmit',[FormController::class,'workWithFormBuilder']);

//  Route::get('/insert',[DBController::class,'insert']);
//  Route::get('/read',[DBController::class,'read']);
//  Route::get('/update',[DBController::class,'update']);
//  Route::get('/delete',[DBController::class,'delete']);
//  Route::get('/execute_multiple_query',[DBController::class,'execute_multiple_query']);
//  Route::get('/muliple_connection',[DBController::class,'muliple_connection_database']);

//  Route::get('/company', [CompanyController::class,'index']);
//  Route::get('/company/create', [CompanyController::class,'create'])->name('company.create');
//  Route::post('/company/store', [CompanyController::class,'store'])->name('company.store');

Route::resource('/company',CompanyController::class);

Route::get('/dashboard', [DBController::class,'showDashboard']);
Route::view('/create','company.addNew');
Route::post('/handleSubmit',[DBController::class,'saveRecord']);

// ----Query Builder---------------

Route::get('/queryBuilder', [DBController::class, 'workWithQueryBuilder']);
// Route::get('/queryBuilder', [DBController::class, 'workWithQueryBuilderReading']);
// Route::get('/queryBuilder', [DBController::class, 'workWithQueryBuilderUpdate']);
// Route::get('/queryBuilder', [DBController::class, 'workWithQueryBuilderDelete']);

Route::get('/schema', [DBController::class, 'workWithSchemaBuilder']);

Route::resource('/company',CompanyController::class);

Route::get('/insert',[AlbumController::class,'insert']);
Route::get('/query',[AlbumController::class,'showQueries']);

Route::resource('/todo',TodoController::class);

Route::get('/oneToOneRelation',[RelationalController::class,'showOneToOneRelation']);
Route::get('/oneToManyRelation',[RelationalController::class,'showOneToMany']);
Route::get('/oneToManyRelationProduct',[RelationalController::class,'showOneToManyProduct']);
Route::get('/oneToManyRelationPractice',[RelationalController::class,'showOneToManyPractice']);
Route::get('/manyToManyRelation',[RelationalController::class,'ManyToMany']);
Route::get('/manyToManyPractice',[RelationalController::class,'ManyToManyPractice']);


Route::get('/queue',function(){

     # dispatch() helper function that sends a new job to a queue
    //  dispatch(function(){
    //     sleep(5);
    //     logger('job done..!');
    //  });

    # ---------- multiple way to dispacth job
    // dispatch(new SendVerificationEmail());
    //  SendVerificationEmail::dispatch();

    #--------Work with multiple connection
    //  SendVerificationEmail::dispatch()->onConnection('redis');

    #-------Work with Multiple Queues--------------
    #- you have jobs that must be processed before any of the others, regardless of which one comes first
    // SendVerificationEmail::dispatch();
    // SendVerificationEmail::dispatch()->onQueue('high-priority');
    // #run priority job in queue
    // #php artisan queue:work --queue=high-priority,default

    // Bus::chain([
    //     new EncodeVideoClip,
    //     new GenerateSubtitles,
    //     new PublishedVideoClip
    // ])->dispatch();

    // Bus::batch([
    //     new EncodeVideoClip,
    //     new GenerateSubtitles,
    //     new PublishedVideoClip,
    // ])->dispatch();

    # create job file in termal cammand
    // php artisan make:job jobfilename


     return view('welcome');
});


Route::get('/laravel_test_mail_with_queue',function(){
    $data['text'] = 'We are sending email via queue';
    $data['email'] = 'nishantharshwardhan@gmail.com';
    dispatch(new MyQueueMailJob($data));
    dd('Mail Send Successfully');
});

# import file using queue
Route::get('/items_import',[ItemImportController::class,'index']);
Route::post('/items_import',[ItemImportController::class,'store']);

# helper fuction
Route::get('/helper',[TestController::class,'testHelperCode']);

# test error handingl
Route::get('/search',[TestController::class, 'index']);
Route::get('/search/result',[TestController::class, 'result']);
