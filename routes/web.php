<?php

use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

\Illuminate\Support\Facades\Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/item', [TodoListController::class, 'index'])->name('item');

Route::prefix('/item')->group(function (){
    Route::post('/store', [TodoListController::class, 'store']);
    Route::put('/{id}', [TodoListController::class, 'update']);
    Route::delete('/{id}', [TodoListController::class, 'destroy']);
});
