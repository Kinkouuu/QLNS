<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DepartmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [LoginController::class,'index'])->name('login');

Route::post('store', [LoginController::class,'store']);
Route::get('logout',[LoginController::class,'logout']);

Route::middleware(['auth'])->group(function()
{
    Route::prefix('admin')->group(function()
    {
        
        Route::get('/',[MainController::class,'index'])->name('admin');
        Route::post('',[MainController::class,'save']);
        //Departments 
        Route::prefix('departments')->group(function()
        {
            Route::get('add',[DepartmentController::class,'create'])->name('departments.create');
            Route::post('add',[DepartmentController::class,'store']);
            Route::get('list',[DepartmentController::class,'index'])->name('departments.list');
            Route::get('edit/{department}',[DepartmentController::class,'show'])->name('departments.edit');
            Route::post('edit/{department}',[DepartmentController::class,'update']);
        });

        //user accounts
        Route::prefix('users')->group(function(){
            Route::get('add',[UserController::class,'create'])->name('users.create');
            Route::post('add',[UserController::class,'store']);
            Route::get('list',[UserController::class,'index'])->name('users.list');
            Route::get('edit/{user}',[UserController::class,'show'])->name('users.edit');
            Route::post('edit/{user}',[UserController::class,'update']);
            Route::delete('destroy',[UserController::class,'destroy']);
            Route::get('reset',[UserController::class,'reset'])->name('users.reset');
            Route::post('reset',[UserController::class,'change']);
            Route::get('verification/{id}',[UserController::class,'verification'])->name('verification');
            Route::post('verification/{id}',[UserController::class,'firstLogin']);
        });
    });
});
