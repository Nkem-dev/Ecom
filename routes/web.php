<?php

// use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});


Route::get('/contact', function () {
    return view('contact');
});

Route::get('/create_user', function () {
    return view('register');
});

//Route to create a new user
Route::post('store', [UserController::class, 'store'])->name('store_user');

//route for logout
Route::post('logout', [UserController::class, 'logout'])->name('logout');





// Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Auth::routes();




Route::get('/welcome', [HomeController::class, 'index'])->name('welcome');

//housing every route of the admin
Route::middleware(['auth', 'isAdmin'])->group(function(){
    //Route for admin dashboard
    Route::get('admin/dashboard', [AdminController::class, 'admin_dashboard'])->name('admin_dashboard'); 

    //route for category
    Route::get('admin/category', [AdminController::class, 'category'])->name('category');

    //add new category
    Route::post('add_category', [AdminController::class, 'add_category'])->name('add_category');

    //delete category
    Route::get('/deleteCategory/{id}', [AdminController::class, 'deleteCategory'])->name('deleteCategory');

    //route for logout
    Route::post('/adminlogout', [AdminController::class, 'adminLogout'])->name('adminLogout');

    //route for create product view
    Route::get('admin/createProduct', [AdminController::class, 'createProduct'])->name('createProduct');

    //route for adding product
    Route::post('addProduct', [AdminController::class, 'addProduct'])->name('addProduct');

    //route to view all the products created
    Route::get('admin/products', [AdminController::class, 'products'])->name('products');

    //route for delete products
    Route::get('/deleteProduct/{id}', [AdminController::class, 'deleteProduct'])->name('deleteProduct');

});