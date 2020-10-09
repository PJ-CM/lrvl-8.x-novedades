<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//A través de Controlador
Route::get('/', 'WelcomeController@index');
// Route::get('/', 'App\Http\Controllers\WelcomeController@index');
// Route::get('/', [WelcomeController::class, 'index']);
