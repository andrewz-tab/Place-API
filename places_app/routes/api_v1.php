<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('/places', [PlaceController::class, 'index'])->name('place.index');
Route::get('/places/{place}', [PlaceController::class, 'show'])->name('place.show');

Route::group([
    'middleware' => 'jwt.auth',
], function($router) {

    Route::post('/places', [PlaceController::class, 'store'])->name('place.store'); 
    Route::delete('/places/{place}/remove', [PlaceController::class, 'removeFromUser'])->name('place.remove');
    Route::post('/places/{place}/add', [PlaceController::class, 'addToUser'])->name('place.add');

    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/users/{user}/favorites', [UserController::class, 'favoritePlaces'])->name('user.favourites');
    Route::post('/users', [UserController::class, 'store'])->name('user.store');
    Route::post('/users/{user}/place/{place}/add', [UserController::class, 'addPlace'])->name('user.place.add'); 
    Route::delete('/users/{user}/place/{place}/remove', [UserController::class, 'removePlace'])->name('user.place.remove'); 

});


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});