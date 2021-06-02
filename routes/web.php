<?php

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[ContactController::class ,'index']);
Route::get('contact',[ContactController::class, 'contact']);
Route::post('store', [ContactController::class, 'store']);
Route::post('destroy/{id}',[ContactController::class, 'destroy']);
Route::put('edit/{id}',[ContactController::class, 'edit']);
Route::patch('update/{id}',[ContactController::class, 'update']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
