<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware(['auth:sanctum'])->group(function(){

    //Get all users
    Route::get('/users' , [ApiController::class,'users']);

    


});

//Get authorization token wiht credentials
Route::post('/getToken',[ApiController::class, 'getToken'])->name("getToken");

Route::get('/login' , [ApiController::class,'login']);

//To create random user
Route::get('/usersfact' , [ApiController::class,'usersfact']);