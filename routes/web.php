<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// -------------------------
// Route for Frontend
// -------------------------

// Route::get('/', function () {
//     return view('frontend/home');
// });

Route::get('/',[HomeController::class,'index'])->name('product.frontend');

// -------------------------
// Route for Backend
// -------------------------


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// Route group for Products 
Route::group(['prefix'=>'/products'],function(){

    Route::get('addProducts',[ProductController::class,'index'])->name('product.add');
    Route::POST('/storeproducts',[ProductController::class,'store'])->name('product.store');
    Route::get('/manageproducts',[ProductController::class,'manage'])->name('product.manage');
    Route::get('/showproducts',[ProductController::class,'show']);
    Route::get('/statusproducts/{id}',[ProductController::class,'status']);
    Route::get('/deleteproducts/{id}',[ProductController::class,'destroy']);
    Route::get('/updateshowproducts/{id}',[ProductController::class,'updateshow']);
    Route::POST('/update/{id}',[ProductController::class,'update']);

    
    
    });

require __DIR__.'/auth.php';
