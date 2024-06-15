<?php

use App\Http\Controllers\RecipeController;
use App\Models\User;
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

// Route::get('/recipes', function () {
//     return view('front-page');
// });
Route::resource('/recipes', RecipeController::class);

//Search recipes---------------------------------
// Route::get('/search' . [User::class, 'search']);
