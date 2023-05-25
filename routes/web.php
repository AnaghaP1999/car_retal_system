<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Admin
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/index', [App\Http\Controllers\AdminController::class, 'adminIndex'])->name('index');
Route::get('/cars-list', [App\Http\Controllers\AdminController::class, 'carList'])->name('cars-list');
Route::get('/users', [App\Http\Controllers\AdminController::class, 'userList'])->name('users');
Route::get('/add-car-details', [App\Http\Controllers\AdminController::class, 'addCar'])->name('add-car-details');
Route::post('/save-car-details', [App\Http\Controllers\AdminController::class, 'saveCarDetails'])->name('save-car-details');
Route::get('/edit-car-details/{id}', [App\Http\Controllers\AdminController::class, 'editCarDetails'])->name('edit-car-details');
Route::get('/delete-car-details/{id}', [App\Http\Controllers\AdminController::class, 'deleteCarDetails'])->name('delete-car-details');


// public
Route::get('/', [App\Http\Controllers\AdminController::class, 'home'])->name('homepage');
Route::get('/about', [App\Http\Controllers\AdminController::class, 'about'])->name('about');
Route::get('/blog', [App\Http\Controllers\AdminController::class, 'blog'])->name('blog');
Route::get('/cars', [App\Http\Controllers\AdminController::class, 'cars'])->name('cars');
Route::get('/services', [App\Http\Controllers\AdminController::class, 'services'])->name('services');
Route::get('/contact', [App\Http\Controllers\AdminController::class, 'contact'])->name('contact');

// User
Route::get('/my-details', [App\Http\Controllers\AdminController::class, 'mydetails'])->name('my-details');
Route::get('/my-journy', [App\Http\Controllers\AdminController::class, 'myJourny'])->name('my-journy');