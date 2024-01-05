<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\GeneralController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [CountryController::class, 'index']);
Route::get('/test', [TestController::class, 'test']);

Route::resource('countries', CountryController::class);
Route::resource('cities', CityController::class);
Route::group(['middleware' => ['auth']], function () {
    Route::resource('admin/groups', GroupController::class);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('admin/api-test', [GeneralController::class, 'apiTest']);
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate');
    Route::get('/register', 'register');
    Route::post('/signup', 'signup');
});
