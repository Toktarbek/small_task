<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ManagerController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [ClientController::class, 'index'])->middleware('client');
Route::get('/requisition', [ClientController::class, 'requisition'])->middleware('client');
Route::post('/send', [ClientController::class, 'send']);

Route::get('/admin', [ManagerController::class, 'index'])->middleware('manager');
Route::get('/admin/answer/{id}', [ManagerController::class, 'answer'])->middleware('manager');
Route::post('/admin/send/{id}', [ManagerController::class, 'send']);
