<?php
use Check24\Http\Route;
use App\Controllers\HomeController;
use App\Controllers\ArticleController;
use App\Controllers\UserController;


Route::get('/',[HomeController::class,'index']);

//Route::get('/signup',[RegisterController::class,'index']);

//Route::get("/signup?id",[RegisterController::class,'show']);

Route::get('/login',[UserController::class,'create']);

Route::post('/login',[UserController::class,'login']);

Route::get('/logout',[UserController::class,'logout']);


Route::get('/post/create',[ArticleController::class,'create']);

Route::post('/post',[ArticleController::class,'store']);

Route::get('/',[ArticleController::class,'index']);
Route::get('/post?id',[ArticleController::class,'show']);



