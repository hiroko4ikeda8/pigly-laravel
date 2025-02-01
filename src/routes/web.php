<?php

use App\Http\Controllers\ContactController;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterStep1Controller;
use App\Http\Controllers\Auth\RegisterStep2Controller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\WeightLogController; // 追加
use Illuminate\Support\Facades\Route;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register/step1', [RegisterStep1Controller::class, 'showStep1'])->name('register.step1');
Route::post('/register/step1', [RegisterStep1Controller::class, 'handleStep1']);
Route::get('/register/step2', [RegisterStep2Controller::class, 'showStep2'])->name('register.step2');
Route::post('/register/step2', [RegisterStep2Controller::class, 'handleStep2']);

// ログインフォームの表示
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

// ログイン処理のルート
Route::post('login', [LoginController::class, 'login'])->name('login.submit');

// アカウント作成画面（会員登録）
Route::get('register', function () {
    return view('auth.register');  // 会員登録画面ビュー
})->name('register');

// 体重ログ関連のルート（リソースルート）
Route::resource('weight-logs', WeightLogController::class);

// 目標体重と現在体重を表示するダッシュボード
Route::get('/weight_logs', [WeightLogController::class, 'index'])->name('dashboard');

// 体重ログの検索機能
Route::get('/search', [WeightLogController::class, 'search'])->name('search');

// 体重ログの登録画面
Route::get('/weight-logs/create', [WeightLogController::class, 'create'])->name('weight-logs.create');

// 体重ログの登録処理
Route::post('/weight-logs', [WeightLogController::class, 'store'])->name('weight-logs.store');

// 体重ログの編集画面
Route::get('/weight-logs/{id}/edit', [WeightLogController::class, 'edit'])->name('weight-logs.edit');

// 体重ログの更新処理
Route::put('/weight-logs/{id}', [WeightLogController::class, 'update'])->name('weight-logs.update');

// 体重ログの削除処理
Route::delete('/weight-logs/{id}', [WeightLogController::class, 'destroy'])->name('weight-logs.destroy');

// 認証後のweight_logs画面（体重ログ一覧）
Route::middleware(['auth'])->group(function () {
    Route::get('/weight-logs', [WeightLogController::class, 'index'])->name('weight-logs');
});

// ログアウト処理（Fortifyを利用している場合、コメントアウトを外す必要がある）
/* Route::post('logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout'); */
