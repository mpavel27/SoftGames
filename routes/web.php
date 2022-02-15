<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Views\ViewsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AdminController;



// Route::get('/', [ApiController::class, 'view']);
Route::middleware("changelocale")->group(function(){
    Route::get('/', [ViewsController::class, 'viewIndex'])->name('index')->middleware('auth');
    Route::get('/login', [ViewsController::class, 'viewLogin'])->name('login')->middleware('guest');
    Route::get('/register', [ViewsController::class, 'viewRegister'])->name('register')->middleware('guest');
    Route::get('/server/{server}', [ViewsController::class, 'viewServer'])->name('server')->middleware('auth');
    Route::get('/api', [ApiController::class, 'view']);

    Route::post('/login/validate', [LoginController::class, 'authenticate'])->middleware('guest');
    Route::post('/register/validate', [RegisterController::class, 'register'])->middleware('guest');

    Route::get('/logout', [LoginController::class, 'authlogout'])->name('logout')->middleware('auth');

    Route::post('/livewire/message/create-product-game-type', \App\Http\Livewire\CreateProductGameType::class);
    Route::get('/categories', \App\Http\Livewire\CategoryDragAndDrop::class);

    Route::prefix('admin')->middleware('isAdmin')->group(function () {
        Route::get('/products', [AdminController::class, 'viewProducts'])->name('admin.products');
        Route::post('/products/createProducts', [AdminController::class, 'createProduct']);
        Route::post('/products/createCategory', [AdminController::class, 'createCategory']);
    });
});
