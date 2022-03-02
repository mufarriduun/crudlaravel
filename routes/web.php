<?php

use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/home', [EmployeeController::class, 'index'])->name('pegawai');
Route::get('/create', [EmployeeController::class, 'create'])->name('create');
Route::post('/insert', [EmployeeController::class, 'insert'])->name('insert');
Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [EmployeeController::class, 'update'])->name('update');
Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');
