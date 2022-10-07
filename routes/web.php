<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmpController;

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
    return view('home');
})->name('app.home');
Route::get('/admin/login',[AdminController::class,'showLogin'])->name('admin.login');
Route::get('/emp/login', [EmpController::class,'showLogin'])->name('emp.login');
Route::post('/admin/login', [AdminController::class,'login'])->name('admin.login');
Route::get('/emp/home',[EmpController::class,'index'])->name('emp.home')->middleware('empcheck');
Route::post('/emp/login', [EmpController::class,'login'])->name('emp.login');
Route::get('/admin/home',[AdminController::class,'index'])->name('admin.home')->middleware('admincheck');
Route::get('/admin/addemp',[AdminController::class,'addempForm'])->name('admin.addempform')->middleware('admincheck');
Route::post('/admin/addemp',[AdminController::class,'addemp'])->name('admin.addemp')->middleware('admincheck');
Route::get('/admin/emps/{id}',[AdminController::class,'showempinfo'])->name('admin.showempinfo')->middleware('admincheck');
Route::get('/admin/addproj',[AdminController::class,'addprojForm'])->name('admin.addproj')->middleware('admincheck');
Route::post('/admin/addproj',[AdminController::class,'addproj'])->name('admin.addproj')->middleware('admincheck');
Route::post('/admin/assignproj',[AdminController::class,'assignProj'])->name('admin.assignproj')->middleware('admincheck');
Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout')->middleware('admincheck');
Route::get('/emp/logout',[EmpController::class,'logout'])->name('emp.logout')->middleware('empcheck');








