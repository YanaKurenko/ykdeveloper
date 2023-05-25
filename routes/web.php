<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\VariableController;
use App\Http\Controllers\WorkController;
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

Route::get('/', [VariableController::class, 'index']);

Route::get('download/{filename}', [DownloadController::class, 'download'])->name('download');
Route::get('/works', [CategoryController::class, 'listMenu']);
Route::get('/workByCategory/{category}', [CategoryController::class, 'workByCategory']);
Route::get('/show/{work}', [WorkController::class, 'show'])->name('work.show');
Route::get('/ask', function(){ return view('form.form'); });
Route::post('/ask', [ContactController::class, 'sendForm']);
