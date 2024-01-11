<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // dashboard
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('auth#dashboard');

    // user
    Route::prefix('user')->middleware('user_auth')->group(function () {
        Route::get('list', function(){
            return view('user.list');
        })->name('user#list');    
    });


    // admin
    Route::prefix('admin')->middleware('admin_auth')->group(function () {
        // category
        Route::prefix('category')->group(function () {

            Route::get('list', [CategoryController::class, 'listPage'])->name('admin#categoryList');
            Route::get('create',[CategoryController::class,'createPage'])->name('admin#categoryCreatePage');
            Route::post('create',[CategoryController::class, 'create'])->name('admin#createCategory');
            Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('admin#deleteCategory');

        });
    });

});

/*

    php artisan cache:clear, config:clear, (config:cache * 3)

*/

// authentication (login, register)
Route::redirect('/', 'loginPage');
Route::get('loginPage', [AuthController::class, 'loginPage'])->name('auth#login');
Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#register');

// admin

