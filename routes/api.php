<?php
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('/employees', function () {
    // Route logic
})->middleware('web');

Route::resource('employees', ApiController::class);
Route::post('/register', [ApiController::class, 'register']);


?>