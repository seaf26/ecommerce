<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SubsectionsController;
use App\Http\Controllers\Authentication
;

use Illuminate\Support\Facades\Route;


Route::prefix('authentication')->group(function () {
    Route::get('/login', [Authentication::class, 'login'])->name('login');
    Route::post('/login', [Authentication::class, 'authentication'])->name('authentication');
    Route::post('/logout', [Authentication::class, 'logout'])->name('logout');
    Route::get('/register', [Authentication::class, 'register'])->name('register');
    Route::post('/register', [Authentication::class, 'registeration'])->name('registeration');
});




Route::middleware(['auth'])->group(function () {


Route::get('/', function () {
    return view('welcome');
})->name('dashboard');


Route::resource('sections', SectionController::class);
Route::resource('subsections', SubsectionsController::class);
Route::resource('products', ProductController::class);
});

