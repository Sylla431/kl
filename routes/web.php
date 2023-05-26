<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeesController;
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

// Route Admin
Route::prefix('admin')->group(function(){

Route::get('/login', [AdminController::class, 'Login'])->name('login_form');

Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin_dasboard')->middleware('admin');

Route::post('/check', [AdminController::class, 'Check'])->name('check_admin');

Route::get('/logout', [AdminController::class, 'Logout'])->name('admin_logout');

Route::get('/register', [AdminController::class, 'Register'])->name('admin_register');

Route::post('/create', [AdminController::class, 'CreateAdmin'])->name('admin_create');

});

// Empoyees Route
Route::prefix('employees')->group(function(){

    Route::get('/login', [EmployeesController::class, 'Login'])->name('login_form');

    Route::get('/dashboard', [EmployeesController::class, 'Dashboard'])->name('employee_dasboard')->middleware('employee');

    Route::post('/check', [EmployeesController::class, 'Check'])->name('check_employee');

    Route::get('/logout', [EmployeesController::class, 'Logout'])->name('employee_logout');

    Route::get('/register', [EmployeesController::class, 'Register'])->name('employee_register');

    Route::post('/create', [EmployeesController::class, 'CreateEmployees'])->name('employee_create');

    });




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
