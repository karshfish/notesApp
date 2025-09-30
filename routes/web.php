<?php

use App\Http\Controllers\auth\Register;
use App\Http\Controllers\auth\Login;
use App\Http\Controllers\auth\Logout;
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
Route::view('/login', 'auth.login')
    ->middleware("guest")
    ->name('login');
Route::post('/login', Login::class)
    ->middleware('guest');
Route::post('/logout', Logout::class)
    ->middleware('auth')
    ->name('logout');
