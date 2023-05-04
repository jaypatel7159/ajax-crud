<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SubEmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\UserAuthenticate;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//
require __DIR__.'/auth.php';


Route::get("userRegister",[UserController::class,'userRegister'])->name("userRegister");
Route::post("storeRegister",[UserController::class,'storeRegister'])->name("storeRegister");

Route::get("userlogin",[UserController::class,'userlogin'])->name("userlogin");
Route::post("checkLogin",[UserController::class,'checkLogin'])->name("checkLogin");
Route::get("userLogout",[UserController::class,'userLogout'])->name("userLogout");

Route::get("userEdit/{id}",[UserController::class,'userEdit'])->name("userEdit");


//employee

Route::get("employeeList",[EmployeeController::class,'employeeList'])->name("employeeList")
->middleware("user.auth");

Route::post("storeEmployee",[EmployeeController::class,'storeEmployee'])->name("storeEmployee");

Route::get("editEmployee",[EmployeeController::class,'editEmployee'])->name("editEmployee");

Route::post("updateEmployee",[EmployeeController::class,'updateEmployee'])->name("updateEmployee");

Route::get("deleteEmployee",[EmployeeController::class,'deleteEmployee'])->name("deleteEmployee");


//sub employee
Route::get("subEmployee",[SubEmployeeController::class,'subEmployee'])->name("subEmployee");

Route::post("addsubEmployee",[SubEmployeeController::class,'addsubEmployee'])->name("addsubEmployee");

Route::get("editsubEmployee/{id}",[SubEmployeeController::class,'editsubEmployee'])->name("editsubEmployee");

Route::post("updatesubEmployee",[SubEmployeeController::class,'updatesubEmployee'])->name("updatesubEmployee");

Route::get("deletesubEmployee/{id}",[SubEmployeeController::class,'deletesubEmployee'])->name("deletesubEmployee");


