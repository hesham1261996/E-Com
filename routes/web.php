<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShopingController;
use App\Http\Controllers\UserController;
use App\Models\Role;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('layouts.main');
});

Route::get('/' , [IndexController::class , 'home'] )->name('home');
Route::get('/categories' , [CategoriesController::class , 'allCaategory'])->name('categories.home');
Route::get('/categories/{category}/items' , [ItemsController::class, 'itemByCat'])->name('show.category');
Route::get('/child/{child}/items' , [ItemsController::class, 'itemByChild'])->name('item_by_child');
Route::post('search' , [ItemsController::class , 'search'])->name('search');
Route::post('comment' , [\App\Http\Controllers\CommentController::class , 'store'])->name('comment');

Route::get('/item/{item}' ,[IndexController::class  , 'show_item'])->name('show.item');
//Route::get('/compaies' ,[ IndexController::class , 'companies'])->name('companies.home');

Route::get('/profile' , [ProfileController::class , 'edit'])->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::prefix('/admin')->middleware(['auth' , 'admin'])->group(function (){
    Route::get('/' , [AdminController::class , 'index'])->name('admin.index');
    Route::resource('/items', ItemsController::class );
    Route::resource('/categories', CategoriesController::class);
    Route::resource('/companies', CompaniesController::class);
    Route::resource('/users' , UserController::class);
    Route::resource('/children' , \App\Http\Controllers\ChildrenController::class);
    Route::get('/permissions' , [PermissionController::class , 'index'])->name('permissions');
    Route::post('/permission', [PermissionController::class , 'store'])->name('edit.permission');

    Route::resource('role' , RoleController::class);
    Route::get('permission_byRole' , [RoleController::class , 'getByRole'])->name('permission_byRole');
});




require __DIR__.'/auth.php';
