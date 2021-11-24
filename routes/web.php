<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BannnerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;

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
    return Redirect::to('/home');
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
Route::get('/events/single/{id}',[HomeController::class,'single_event'])->name('single.view');


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
Route::post('/admin/events/store',[EventController::class,'store'])->name('event.store');



//event list routes 
Route::get('/admin/events/list',[EventController::class, 'event']);
Route::get('/admin/events/edit/{id}',[EventController::class,'edit'])->name('event.edit');
Route::get('/admin/events/delete/{id}',[EventController::class,'delete'])->name('event.delete');
Route::put('/admin/events/update',[EventController::class,'update'])->name('event.update');



//about routes

Route::get('/admin/about/create',[AboutController::class,'add']);
Route::post('/admin/about/store',[AboutController::class,'store'])->name('about.store');



// about list routes

Route::get('/admin/about/list',[AboutController::class, 'list']);
Route::get('/admin/about/edit/{id}',[AboutController::class,'edit'])->name('about.edit');
Route::put('/admin/about/update/',[AboutController::class,'update'])->name('about.update');


Route::delete('/admin/about/delete/{id}',[AboutController::class,'destroy'])->name('about.delete');



//blog list route
Route::get('/admin/blog/create',[BlogController::class,'create']);
Route::post('/admin/blog/store',[BlogController::class,'store'])->name('blog.store');
Route::get('/admin/blog/list',[BlogController::class,'list']);

Route::get('/admin/blog/edit/{id}',[BlogController::class,'edit'])->name('blog.edit');

Route::put('/admin/blog/update/',[BlogController::class,'update'])->name('blog.update');









