<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LoginController;

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

// Route:: get('/customer/{id}', function ($id) {
//     return view('employees');
// });

Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);

Route::middleware('LoginAuthIsLoogedIn')->group(function () {    
    Route::get('/logout', [LoginController::class, 'logout']);
    Route:: resource('employee', EmployeeController::class);
    Route:: resource('company', CompanyController::class); 
});
