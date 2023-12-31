<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController; // <- part 1 addition
use App\Http\Controllers\ItemController; //<- part 3
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


Auth::routes();

//part 1 additions
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories', [CategoryController::class, 'store']); 
Route::get('/categories', [CategoryController::class, 'index']);  //added index route

//part 2 additions
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit']);
Route::patch('/categories/{id}', [CategoryController::class, 'update']);

//part 3 additions
Route::get('/items/create', [ItemController::class, 'create']);
Route::post('/items', [ItemController::class, 'store']);
Route::get('/items', [ItemController::class, 'index']); //REMEMBER ->index

//part 4 additions
Route::get('/items/{id}/edit', [ItemController::class, 'edit']);
Route::patch('/items/{id}', [ItemController::class, 'update']);

Route::get('/items/{id}/delete', [ItemController::class. 'confirmDelete']);
Route::delete('items/{id}', [ItemController::class, 'destroy']);