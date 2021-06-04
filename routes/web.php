<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\PictureController;
use App\Http\Controllers\Admin\ProductControler;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductPropertyController;
use App\Http\Controllers\Admin\propertyController;
use App\Http\Controllers\Admin\propertyGroupsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\commentController;
use App\Http\Controllers\Client\LikeController;
use App\Http\Controllers\Client\ProductController as ClientProductController ;
use App\Http\Controllers\Client\RegisterController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuController as MenuControllerAlias;
use App\Http\Middleware\checkPermission;
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

Route::get('/',[MenuControllerAlias::class,'index']);
Route::prefix("/paneladmin")->middleware([checkPermission::class .":view_dashboard",'auth'])->group(function (){
    Route::get('/', function () {
        return view('admin.home');
    });
    Route::get('/categories',[categoryController::class, 'index'])->name("categories.index");
    Route::get('/categories/create',[categoryController::class, 'create'])->name("categories.create");
    Route::post('/categories/store',[categoryController::class, 'store'])->name("categories.store");
    Route::get('/categories/{category}/edit',[categoryController::class, 'edit'])->name("categories.edit");
    Route::patch('/categories/{category}',[categoryController::class, 'update'])->name("categories.update");
    Route::delete('/categories/{category}',[categoryController::class, 'destroy'])->name("categories.destroy");


    Route::get('/brands',[BrandController::class, 'index'])->name("brands.index");
    Route::get('/brands/create',[BrandController::class, 'create'])->name("brands.create");
    Route::post('/brands/store',[BrandController::class, 'store'])->name("brands.store");
    Route::get('/brands/{brand}/edit',[BrandController::class, 'edit'])->name("brands.edit");
    Route::patch('/brands/{brand}',[BrandController::class, 'update'])->name("brands.update");
    Route::delete('/brands/{brand}',[BrandController::class, 'destroy'])->name("brands.destroy");


    Route::get('/product',[ProductControler::class, 'index'])->name("product.index");
    Route::get('/product/create',[ProductControler::class, 'create'])->name("product.create");
    Route::post('/product/store',[ProductControler::class, 'store'])->name("product.store");
    Route::get('/product/{product}/edit',[ProductControler::class, 'edit'])->name("product.edit");
    Route::patch('/product/{product}',[ProductControler::class, 'update'])->name("product.update");
    Route::delete('/product/{product}',[ProductControler::class, 'destroy'])->name("product.destroy");
    Route::delete('/product/{product}/comments',[CommentsController::class, 'destroy'])->name("comment.destroy");
    Route::get('/product/{product}/comments',[CommentsController::class, 'index'])->name("products.comments.index");
    Route::get('/product/{product}/properties',[ProductPropertyController::class,'index'])->name('product.property.index');
    Route::get('/product/{product}/properties/create',[ProductPropertyController::class,'create'])->name('product.property.create');
    Route::post('/product/{product}/properties',[ProductPropertyController::class,'store'])->name('product.property.store');
    Route::resource("products.picture",PictureController::class);
    Route::resource("products.discount",DiscountController::class);
    Route::resource("role",RoleController::class);
    Route::resource("users",UserController::class);
    Route::resource("properties",propertyGroupsController::class);
    Route::resource("property",propertyController::class);



});

Route::prefix('')->name('client.')->group(function (){
    Route::get('/',[MenuController::class,'index'])->name('index');
    Route::post('/product/{product}/comment/store',[commentController::class,'store'])->name('product.comment');
    Route::post('/likes/{product}',[LikeController::class,'store'])->name('like');
    Route::get('/likes',[LikeController::class,'index'])->name('like.index');
    Route::post('/cart/store',[CartController::class,'store'])->name('cart.store');
    Route::get('/register',[RegisterController::class,'create'])->name('register');
    Route::delete('/register/logout',[RegisterController::class,'logout'])->name("register.logout");
    Route::post('/register/sendemail',[RegisterController::class,'sendemail'])->name("register.sendemail");
    Route::post('/register/opt/{user}',[RegisterController::class,'opt'])->name("register.opt");
    Route::get('/register/verify/{user}',[RegisterController::class,'verifyopt'])->name("register.verify");
    Route::get('/product/{product}',[ClientProductController::class,'show'])->name('product.show');
});

