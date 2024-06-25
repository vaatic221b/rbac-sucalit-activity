<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function(){
    Route::view('/home','homepage');
    Route::get('/admin', [AdminController::class, 'index'])->name('dash')->middleware('role:admin');
    Route::get('/acctg',[UserController::class,'loadAcctgPage'])->middleware('role:bookeeper');
    Route::get('/prod',[UserController::class,'loadAssemblePage'])->middleware('role:assembler');
});

