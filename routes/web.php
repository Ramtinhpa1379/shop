<?php

use App\Http\Controllers\Admin\CategoryController;
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

Route::get('/',[\App\Http\Controllers\Client\MenuController::class,'index']);
Route::prefix("/paneladmin")->group(function (){
    Route::get('/', function () {
        return view('admin.home');
    });
    Route::get('/categories',[categoryController::class, 'index'])->name("categories.index");
    Route::get('/categories/create',[categoryController::class, 'create'])->name("categories.create");
    Route::post('/categories/store',[categoryController::class, 'store'])->name("categories.store");
    Route::get('/categories/{category}/edit',[categoryController::class, 'edit'])->name("categories.edit");
    Route::patch('/categories/{category}',[categoryController::class, 'update'])->name("categories.update");
    Route::delete('/categories/{category}',[categoryController::class, 'destroy'])->name("categories.destroy");
});
