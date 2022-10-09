<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SessionController;

use App\Http\Livewire\Dashboard\Dashboard;
use App\Http\Livewire\Categories\Categories;

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

Route::get('/', [SessionController::class, 'index'])->middleware('admin-middleware');

Route::post('/login', [SessionController::class, 'login']);
Route::get('/logout', [SessionController::class, 'logout']);

Route::get('/dashboard', Dashboard::class)->middleware('admin-middleware');
Route::get('/categories', Categories::class)->middleware('admin-middleware');
