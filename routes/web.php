<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::group(['middleware' => 'checklogin'], function () {
    // Routes that require authentication

    Route::get('admin/', [AdminController::class, 'index'])->name("admin.index");
    Route::resource('admin/product', ProductController::class);
    Route::get('admin/logout', [AdminController::class, 'logout'])->name("admin.logout");
});

Route:: get('admin/login',[AdminController::class,'login'])->name("admin.login");
Route:: post('admin/login',[AdminController::class,'checklogin'])->name("admin.loginpost");
// Route:: get('admin/',[AdminController::class,'index'])->name("admin.index");


// Route:: resource('admin/product',ProductController::class);


Route:: get('login',[UserController::class,'login']);
Route:: post('login',[UserController::class,'checklogin'])->name('user.loginpost');

Route:: get('register',[UserController::class,'register'])->name('user.register');
Route:: post('register',[UserController::class,'store'])->name('user.create');


require __DIR__.'/auth.php';
