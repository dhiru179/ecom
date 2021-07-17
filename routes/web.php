<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Front\FrontController;
use App\Models\Categories;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[FrontController::class,'index']);
Route::get('home/register',[FrontController::class,'register']);
Route::post('home/registeration',[FrontController::class,'userRegistration'])->name('home.registration');
Route::post('home/auth',[FrontController::class,'userAuth'])->name('home.auth');
Route::get('home/logout', function () {
    session()->forget('USER_LOGIN');
    session()->forget('USER_ID');
    session()->forget('USER_STATUS');
    session()->forget('USER_NAME');
    session()->flash('error', 'Sucsessfully Logout');
    return redirect('/');
})->name('home.logout');



Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');

Route::group(['middleware' => 'Admin_Auth'], function () {
    // Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error', 'Sucsessfully Logout');
        return redirect('admin');
    })->name('admin.logout');
     Route::get('admin/dashboard', [AdminController::class, 'dashboard']);

    Route::get('admin/categories', [CategoriesController::class, 'index']);
    Route::get('admin/categories/addcategories', [CategoriesController::class, 'addcategories']);
    Route::get('admin/categories/addcategories/{id}', [CategoriesController::class, 'addcategories']);
    Route::post('admin/categories/manageCategories', [CategoriesController::class, 'manageCategories'])->name('admin.categories.manageCategories');
    Route::get('admin/categories/deleteCategories/{id}', [CategoriesController::class, 'deleteCategories']);
    Route::get('admin/categories/status/{status}/{id}', [CategoriesController::class, 'status']);

        //product routes
    
    Route::get('admin/product', [ProductController::class, 'index']);
    Route::get('admin/product/addproduct', [ProductController::class, 'addproduct']);
    Route::get('admin/product/addproduct/{id}', [ProductController::class, 'addproduct']);
    Route::post('admin/product/manageproduct', [ProductController::class, 'manageproduct'])->name('admin.product.manageproduct');
    Route::get('admin/product/deleteproduct/{id}', [ProductController::class, 'deleteproduct']);
    Route::get('admin/product/status/{status}/{id}', [ProductController::class, 'status']);
    Route::get('admin/product/deleteproductattr/{pdid}/{pdattrid}', [ProductController::class, 'delete_product_attributes']);
    
});
