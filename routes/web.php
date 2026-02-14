<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\DB;

Route::get('/',[PostController::class,'index'])->name('post.index');


Route::get('/home', function () {
    return view('welcome');
});

Route::get('/oldurl',[PostController::class,'oldurl']);


Route::get('/new-url',[PostController::class,'newurl'])->name('name');

Route::get('/posts/{slug}',[PostController::class,'detail'])->name('post.detail');

Route::get('/contact',[HomeController::class,'contactForm'])->name('contact.show');
Route::get('/about',[HomeController::class,'about'])->name('about.show');

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return "Database Connected!";
    } catch (\Exception $e) {
        return $e->getMessage();
    }
});

Route::post('/contact',[HomeController::class,'submitContactForm'])->name('contact.store');