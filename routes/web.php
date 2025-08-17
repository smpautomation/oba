<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChecklistController;

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


Route::view('/', 'welcome')->name('login');

Route::view('/register', 'register')->name('register');

// Basic authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::view('/viewlist', 'viewlist')->name('viewlist');
    Route::view('/checklist', 'checklist')->name('checklist');
    Route::get('checklist/{id}', [ChecklistController::class, 'showChecklist'])->name('checklist.show');
});

// Admin-only routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::view('/settings', 'settings')->name('settings');
    Route::view('/users', 'users')->name('users');
});

