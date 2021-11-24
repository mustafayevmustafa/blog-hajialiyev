<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Controller;

use App\Http\Controllers\HomeController;

//Route::get('/', function () {
//    return view('home');
//});


Route::get('/', 'HomeController@index')->name("home");

//Route::get('/category', 'HomeController@category');
Route::get('/category/{category}',[HomeController::class,'category'])->name('category');
Route::get('/categories/load', 'HomeController@loadCategory')->name('categories.load');
Route::get('/categories1/load', 'HomeController@loadCategory1')->name('categories1.load');



Route::get('/article/{slug}', 'HomeController@article')->name('articles.cat');
Route::get('/articles/load', 'HomeController@loadArticles')->name('articles.load');
Route::get('/articles1/load', 'HomeController@loadArticles1')->name('articles1.load');

Route::get('/search', [HomeController::class, 'search'])->name('search');
