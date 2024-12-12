<?php

use Illuminate\Support\Facades\Auth;
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
    if (Auth::check()) {
        return view("home");
    } else {
        return view("auth.login");
    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Routes for properties
Route::resource('admin/properties', App\Http\Controllers\Admin\PropertyController::class, ['as' => 'admin']);

//Routes for messages
Route::resource('admin/messages', App\Http\Controllers\Admin\MessageController::class, ['as' => 'admin']);

//Routes for sponsorships
Route::resource('admin/sponsorships', App\Http\Controllers\Admin\SponsorshipController::class, ['as' => 'admin']);