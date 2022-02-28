<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\categoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//  ----------------- Categories Controller ----------------------
Route::get('dashboard', [adminController::class , 'index']);
Route::get('dashboard/categories/add', [categoriesController::class , 'addCategory']);
Route::post('dashboard/categories/postadd', [categoriesController::class , 'postAddCategory']);

Route::get('dashboard/categories', [categoriesController::class , 'getCategories']);

Route::get('dashboard/categories/delete/{id}', [categoriesController::class , 'deleteCategory']);
Route::get('dashboard/categories/delete-all', [categoriesController::class , 'deleteAllCategories']);

Route::get('dashboard/categories/update/{id}', [categoriesController::class , 'updateCategory']);
Route::post('dashboard/categories/postupdate', [categoriesController::class , 'postUpdateCategory']);
