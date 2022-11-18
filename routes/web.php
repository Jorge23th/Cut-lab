<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;
use App\Models\Material;

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

Route::get('/', function () {
    return view('auth.login');
});


Route::resource('materiales',MaterialController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [MaterialController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function(){

    Route::get('/', [MaterialController::class, 'index'])->name('home');





});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
