<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoginController;
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
    return view('welcome');
});

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::get('loginApi', [LoginController::class, 'loginApi'])->name('loginApi');