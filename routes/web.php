<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;

// Route::get('/hello', function () {
//     return view('hello');
// });
// Route::get('/hello/{id}', function ($id) {
//     return view('hello', ['name' => 'fady', 'id' => $id]);
// });
Route::get('/', NotesController::class . '@index');
Route::resource('notes', NotesController::class);
Route::view('/register', 'auth.register'); //using view method to view the registration page