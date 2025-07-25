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

Route::view('/', 'welcome')->name('welcome');

Route::view('/settings', 'settings')->name('settings');
Route::view('/viewlist', 'viewlist')->name('viewlist');
Route::view('/checklist', 'checklist')->name('checklist');
Route::get('checklist/{id}', [ChecklistController::class, 'showChecklist']);
