<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::resource('users', UserController::class);
Route::resource('employees',EmployeeController::class);






