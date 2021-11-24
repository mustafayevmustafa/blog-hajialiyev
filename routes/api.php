<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/category', [\App\Http\Controllers\Api\CategoryController::class, 'get']);
Route::post('/contact-us', [\App\Http\Controllers\Api\ContactUsController::class, 'save']);
Route::post('/notification/set', [\App\Http\Controllers\Api\NotificationController::class, 'set']);
Route::post('/notification/turn-on', [\App\Http\Controllers\Api\NotificationController::class, 'turnOn']);
Route::post('/article/save', [\App\Http\Controllers\Api\ArticleController::class, 'save']);
Route::post('/article/unsave', [\App\Http\Controllers\Api\ArticleController::class, 'unsave']);

Route::get('/article/webview/{id}', [\App\Http\Controllers\Api\ArticleController::class, 'webview']);
Route::get('/article/detail/{id}', [\App\Http\Controllers\Api\ArticleController::class, 'detail']);
Route::get('/article/search', [\App\Http\Controllers\Api\ArticleController::class, 'search']);
Route::get('/article/category/{categoryId}', [\App\Http\Controllers\Api\ArticleController::class, 'searchByCategory']);
Route::get('/article/favourite', [\App\Http\Controllers\Api\ArticleController::class, 'favourite']);
Route::get('/article/video', [\App\Http\Controllers\Api\ArticleController::class, 'video']);
Route::get('/advertisement/random', [\App\Http\Controllers\Api\AdvertisementController::class, 'random']);
