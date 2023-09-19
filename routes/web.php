<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasisPengetahuanController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\userController;
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

Route::get('/',[AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/loginProcess', [AuthController::class, 'loginProcess'])->name('loginProcess');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registerProcess', [AuthController::class, 'registerProcess'])->name('registerProcess');

Route::get('/user', [userController::class, 'index'])->name('kelola.user')->middleware('isAdmin');
Route::get('/user/tambahuser', [userController::class, 'create'])->name('tambah.user')->middleware('isAdmin');
Route::post('/user/tambahuserProcess', [userController::class, 'store'])->name('tambahuser.process')->middleware('isAdmin');
Route::get('/user/edituser/{id}',[userController::class, 'edit'])->name('edit.user')->middleware('isAdmin');
Route::post('/user/editProcess/{id}', [userController::class, 'update'])->name('update.user')->middleware('isAdmin');
Route::get('/user/delete/{id}', [userController::class, 'delete'])->name('delete.user')->middleware('isAdmin');

Route::resource('/gejala', GejalaController::class)->except('show')->middleware('isAdmin');

Route::resource('/penyakit', PenyakitController::class)->except('show')->middleware('isAdmin');
Route::resource('/pengetahuan', BasisPengetahuanController::class)->except('show')->middleware('isAdmin');

Route::get('/diagnosa', [DiagnosaController::class, 'diagnosa'])->name('diagnosa')->middleware('auth');
Route::post('/diagnosa/process', [DiagnosaController::class, 'diagnosaProcess'])->name('diagnosa.process')->middleware('auth');
Route::get('/diagnosa/riwayat', [DiagnosaController::class, 'riwayat'])->name('riwayat.diagnosa')->middleware('auth');