<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\TimeStampsController;
use App\Http\Controllers\AttendanceController;

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

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'destroy']);

Route::get('/', [TimeStampsController::class, 'screen']);
Route::get('/work', [TimeStampsController::class, 'start']);
Route::post('/work', [TimeStampsController::class, 'restart']);
Route::get('/break', [TimeStampsController::class, 'break']);
Route::post('/break', [TimeStampsController::class, 'stop']);
Route::get('/attendance', [AttendanceController::class, 'screen']);
