<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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

// 主頁
Route::get('/', [TaskController:: class, 'home']);

// 發佈任務
Route::get('/tasks/create', [TaskController::class, 'create']);

// 儲存任務
Route::post('/tasks', [TaskController::class, 'store']);

// 查看任務
Route::get('/users/tasks', [TaskController::class, 'check']);

// 更新任務狀態
Route::put('/tasks/{id}', [TaskController::class, 'update']);

// 註冊會員
Route::get('/register', [UserController::class, 'register']);

// 儲存會員
Route::post('/users', [UserController::class, 'store']);

// 登出會員
Route::post('/logout', [UserController::class, 'logout']);

// 登入會員頁面
Route::get('/login', [UserController::class, 'login']);

// 登入會員認證
Route::post('/users/authenticate', [UserController::class, 'authenticate']);