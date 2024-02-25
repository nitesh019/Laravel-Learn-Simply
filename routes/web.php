<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


#Gates in Routes
// Route::get('/user/delete',[TestController::class,'delete'])->middleware('can:is_admin');
// Route::get('/user/show',[TestController::class,'show'])->middleware('can:is_user');

#Gates in Controller
Route::get('/user/delete',[TestController::class,'delete']);
Route::get('/user/show',[TestController::class,'show']);

# Policies route
Route::get('/posts/edit/{post}',[TestController::class,'edit']);
// Route::get('/posts/edit/{post}',[TestController::class,'edit'])->can('update','post');
// Route::get('/posts/edit/{post}',[TestController::class,'edit'])->middleware('can:update,post');

Route::get('/course',[CourseController::class,'index']);
Route::post('/course',[CourseController::class,'store']);



Route::get('/debug',[TestController::class,'debug']);
