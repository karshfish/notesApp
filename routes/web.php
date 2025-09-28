<?php

use App\Http\Controllers\auth\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;

// Route::get('/hello', function () {
//     return view('hello');
// });
// Route::get('/hello/{id}', function ($id) {
//     return view('hello', ['name' => 'fady', 'id' => $id]);
// });

Route::resource('notes', NotesController::class)->middleware("auth");
Route::view('/register', 'auth.register')
    ->middleware("guest")
    ->name('register'); //using view method to view the registration page
Route::post('/register', Register::class)
    ->middleware('guest');
