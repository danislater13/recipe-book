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

Route::get('/', function () {
    return redirect('/recipes');
});
Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/new-recipe', [RecipeController::class, 'create'])->name('recipes.create');
Route::post('/recipes/store', [RecipeController::class, 'store'])->name('recipes.store');
Route::get('recipe/{recipe}/{recipename}', [RecipeController::class, 'show'])->name('recipe.show');
// Route::put('recipe/{recipe}/update', [RecipeController::class, 'update'])->name('recipe.update');
Route::post('recipe/update/{recipe}', [RecipeController::class, 'update'])->name('recipe.update');


Route::get('/PDF/{recipe}', [RecipeController::class, 'pdf'])->name('recipe.pdf');
