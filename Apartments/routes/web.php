<?php

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
    return view('auth/login');
});
// Add these to your routes/web.php
Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
Route::get('/change-password', 'ProfileController@showChangePasswordForm')->name('password.change');
Route::post('/change-password', 'ProfileController@changePassword')->name('password.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});


// Visitor Routes
Route::resource('visitors', 'VisitorController')->names([
    'index' => 'visitors.index',
    'create' => 'visitors.create',
    'store' => 'visitors.store',
    'show' => 'visitors.show',
    'edit' => 'visitors.edit',
    'update' => 'visitors.update',
    'destroy' => 'visitors.destroy'
]);

// Resident Routes
Route::resource('residents', 'ResidentController');

// Report Routes
Route::get('reports', 'ReportController@index')->name('reports.index');

// Dashboard Route
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Profile Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/change-password', [ProfileController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('password.update');
});

