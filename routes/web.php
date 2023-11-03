<?php

use App\Http\Controllers\ClothesController;
use App\Models\Clothes;
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
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
Route::get('clothes', [ClothesController::class, 'index'])->name('clothes.index');
Route::get('clothes/create', [ClothesController::class, 'create'])->name('clothes.create');
Route::post('clothes', [ClothesController::class, 'store'])->name('clothes.store');
Route::get('clothes/{cloth}', [ClothesController::class, 'show'])->name('clothes.show');
Route::get('clothes/{cloth}/edit', [ClothesController::class, 'edit'])->name('clothes.edit');
Route::put('clothes/{cloth}', [ClothesController::class, 'update'])->name('clothes.update');
Route::delete('clothes/{cloth}', [ClothesController::class, 'destroy'])->name('clothes.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
