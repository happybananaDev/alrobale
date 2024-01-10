<?php

use App\Http\Controllers\MenuController;
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

Route::get('/', [MenuController::class, 'getMenus']);   // Load HomePage

Route::post('/send', [UserController::class, 'sendMail']);  // Send mail from contact form

Route::post('/menu/upload', [MenuController::class, 'uploadMenu']); // Upload new menu

Route::post('/menu/remove', [MenuController::class, 'removeMenu']); // Remove menu

Route::post('/gallery/upload', [MenuController::class, 'uploadImage']); // Upload image to gallery

Route::post('/gallery/remove', [MenuController::class, 'removeImage']); // Remove image from gallery

Route::get('/admin', [UserController::class, 'getAdmin']);  // Go to admin login form

Route::post('/admin/login', [UserController::class, 'adminLogin']); // Login as admin

Route::post('/logout', [UserController::class, 'adminLogout']); // Logout from admin account

// Change site language
Route::get('/{locale}', [MenuController::class, 'setLang']);