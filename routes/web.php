<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;


Route::get('/', function () {
    return view('welcome');
});
// Route::get('/hello', function () {
//     return view('hello');
// });
// Route::get('/hello/{id}', function ($id) {
//     return view('hello', ['name' => 'fady', 'id' => $id]);
// });
Route::resource('notes', NotesController::class);
