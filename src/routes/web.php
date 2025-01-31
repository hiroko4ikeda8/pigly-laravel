<?php

use App\Http\Controllers\Auth\RegisterStep1Controller;
use App\Http\Controllers\Auth\RegisterStep2Controller;
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

Route::get('/register/step1', [RegisterStep1Controller::class, 'showStep1'])->name('register.step1');
Route::post('/register/step1', [RegisterStep1Controller::class, 'handleStep1']);

Route::get('/register/step2', [RegisterStep2Controller::class, 'showStep2'])->name('register.step2');
Route::post('/register/step2', [RegisterStep2Controller::class, 'handleStep2']);
