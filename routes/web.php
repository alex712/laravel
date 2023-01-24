<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [RegistrationController::class, 'dashboard']);
Route::get('login', [RegistrationController::class, 'index'])->name('login');
Route::post('login', [RegistrationController::class, 'login'])->name('login');
Route::get('register', [RegistrationController::class, 'registration'])->name('register');
Route::post('register', [RegistrationController::class, 'register'])->name('register');
Route::get('signout', [RegistrationController::class, 'signOut'])->name('signout');
Route::get('update', [RegistrationController::class, 'update'])->name('update');
Route::post('update-user', [RegistrationController::class, 'updateUser'])->name('update.user');
