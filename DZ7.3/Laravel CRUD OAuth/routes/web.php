<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\JobController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::resource('regions', RegionController::class)->middleware(['auth']);
Route::resource('countries', CountryController::class)->middleware(['auth']);
Route::resource('locations', LocationController::class)->middleware(['auth']);
Route::resource('departments', DepartmentController::class)->middleware(['auth']);
Route::resource('employees', EmployeeController::class)->middleware(['auth']);
Route::resource('jobs', JobController::class)->middleware(['auth']);

Route::get('auth/redirect', [\App\Http\Controllers\Auth\SocialController::class, 'redirect']);
Route::get('auth/callback', [\App\Http\Controllers\Auth\SocialController::class, 'callback']);

require __DIR__.'/auth.php';
