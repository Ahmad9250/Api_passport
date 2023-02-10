<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\DepartmentController;
use App\Http\Controllers\API\Employeecontroller;
use App\Http\Controllers\API\DesignationController;
use App\Http\Controllers\API\EmployeeMetaDataController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);


Route::middleware('auth:api')->group( function () {

    // Route::resource('products', ProductController::class);

    ////designation controller route
    Route::get('designations',[DesignationController::class,'index']);
    Route::get('designations/{id}',[DesignationController::class,'show']);
    Route::post('designations',[DesignationController::class,'store']);
    Route::put('designations/{id}',[DesignationController::class,'update']);
    Route::delete('designations/{id}',[DesignationController::class,'destroy']);

    //department routes
    Route::get('department',[DepartmentController::class,'index']);
    Route::get('department/{id}',[DepartmentController::class,'show']);
    Route::post('department',[DepartmentController::class,'store']);
    Route::put('department/{id}',[DepartmentController::class,'update']);
    Route::delete('department/{id}',[DepartmentController::class,'destroy']);

    //Employee metadata routes
    Route::get('metadata',[EmployeeMetaDataController::class,'index']);
    Route::get('metadata/{id}',[EmployeeMetaDataController::class,'show']);
    Route::post('metadata',[EmployeeMetaDataController::class,'store']);
    Route::put('metadata/{id}',[EmployeeMetaDataController::class,'update']);
    Route::delete('metadata/{id}',[EmployeeMetaDataController::class,'destroy']);

    //Employee routes
    Route::get('employees',[Employeecontroller::class,'index']);
    Route::get('employees/{id}',[Employeecontroller::class,'show']);
    Route::post('employees',[Employeecontroller::class,'store']);
    Route::put('employees/{id}',[Employeecontroller::class,'update']);
    Route::delete('employees/{id}',[Employeecontroller::class,'destroy']);

});

    