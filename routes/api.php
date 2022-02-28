<?php

use App\Http\Controllers\API\commentsController;
use App\Http\Controllers\API\coursesController;
use App\Http\Controllers\API\postsController;
use App\Http\Controllers\API\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\categoriesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Users
Route::post('/add-user',[userController::class,'adduser']);
Route::get('/users',[userController::class,'getAllUsers']);
Route::get('/users/{id}',[userController::class,'getUserById']);
Route::put('/update-user/{id}',[userController::class,'updateUser']);
Route::delete('/delete-user/{id}',[userController::class,'deleteUser']);



// Categories
Route::post('add-category' , [categoriesController::class , 'addCategory']);
Route::post('update-category/{id}' , [categoriesController::class , 'updateCategory']);
Route::get('categories' , [categoriesController::class , 'getAllCategories']);
Route::get('category/{id}' , [categoriesController::class , 'getCategoryById']);
Route::delete('delete-category/{id}' , [categoriesController::class , 'deleteCategory']);


//Courses
Route::post('add-course' , [coursesController::class , 'addCourse']);
Route::put('update-course/{id}' , [coursesController::class , 'updateCourse']);
Route::get('courses' , [coursesController::class , 'getAllCourses']);
Route::get('courses/{id}' , [coursesController::class , 'getCourseById']);
Route::delete('delete-course/{id}' , [coursesController::class , 'deleteCourse']);


//Posts
Route::post('add-post' , [postsController::class , 'createPost']);
Route::put('update-post/{id}' , [postsController::class , 'updatePost']);
Route::get('posts' , [postsController::class , 'getAllPosts']);
Route::get('posts/{id}' , [postsController::class , 'getPostById']);
Route::delete('delete-post/{id}' , [postsController::class , 'deletePost']);


//Comments
Route::post('add-comment' , [commentsController::class , 'createComment']);
Route::put('update-comment/{id}' , [commentsController::class , 'updateComment']);
Route::get('posts/{post_id}/comments' , [commentsController::class , 'getAllComments']);
//get comment by id
Route::get('comments/{id}' , [commentsController::class , 'getCommentById']);
//get comment by post id
Route::get('posts/{post_id}/comments' , [commentsController::class , 'getCommentsByPostId']);
// get comment by user id
Route::get('users/{user_id}/comments' , [commentsController::class , 'getCommentsByUserId']);
Route::delete('delete-comment/{id}' , [commentsController::class , 'deleteComment']);
