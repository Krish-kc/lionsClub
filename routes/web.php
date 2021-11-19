<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BannnerController;
use App\Http\Controllers\EventController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class,'AdminHome']);
Route::get('/about',[HomeController::class,'about']);
Route::get('/blog',[HomeController::class,'blog']);
Route::get('/contact',[HomeController::class,'contact']);
Route::get('/events',[HomeController::class,'events']);



//banner routes
Route::get('/admin/banner/create',[BannnerController::class,'add']);
Route::post('/banner_store',[BannnerController::class,'store'])->name('banner_store');
Route::put('/admin/banner/update',[BannnerController::class,'update'])->name('banner.update');


//list routes 
Route::get('/admin/banner/list',[BannnerController::class,'index']);
Route::get('/admin/banner/edit/{id}',[BannnerController::class,'edit'])->name('banner.edit');
Route::get('/bannerstatus',[BannnerController::class,'changeStatus']);

Route::delete('/banner/{id}',[BannnerController::class,'destroy'])->name('banner.delete');



//event routes

Route::get('/admin/events/create',[EventController::class,'add']);
Route::post('/admin/banner/store',[EventController::class,'store'])->name('event.store');



//event list routes 
Route::get('/admin/events/list',[EventController::class, 'event']);
Route::get('/admin/events/edit/{id}',[EventController::class,'edit'])->name('event.edit');
Route::get('/admin/events/delete/{id}',[EventController::class,'delete'])->name('event.delete');
Route::put('/admin/events/update',[EventController::class,'update'])->name('event.update');

