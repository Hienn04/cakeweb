<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\ProductController;
use App\Http\Controllers\Website\PostController;
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
// router danh cho guest
Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/about',[HomeController::class, 'about'])->name('about');

Route::prefix('contacts')->group(function () {
    Route::get('/', [ContactController::class, 'showContact'])->name('website.contact.index');
    Route::post('/create', [ContactController::class, 'create'])->name('contact.create');
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('website.product.index');
    Route::post('/search', [ProductController::class, 'search'])->name('website.product.search');
});

Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('website.post.index');
    Route::post('/search', [PostController::class, 'search'])->name('website.post.search');
});
    

// router danh cho admin

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::post('/search', [CategoryController::class, 'search'])->name('admin.category.search');
        Route::post('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/update', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    });

    Route::prefix('product')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('admin.product.index');
        Route::post('/search', [AdminProductController::class, 'search'])->name('admin.product.search');
        Route::post('/create', [AdminProductController::class, 'create'])->name('admin.product.create');
        Route::post('/update', [AdminProductController::class, 'update'])->name('admin.product.update');
        Route::delete('/delete/{id}', [AdminProductController::class, 'delete'])->name('admin.product.delete');
    });

    Route::prefix('post')->group(function () {
        Route::get('/', [AdminPostController::class, 'index'])->name('admin.post.index');
        Route::post('/search', [AdminPostController::class, 'search'])->name('admin.post.search');
        Route::post('/create', [AdminPostController::class, 'create'])->name('admin.post.create');
        Route::post('/update', [AdminPostController::class, 'update'])->name('admin.post.update');
        Route::delete('/delete/{id}', [AdminPostController::class, 'delete'])->name('admin.post.delete');
    });

    Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');


    Route::prefix('contact')->group(function () {
        Route::get('/', [AdminContactController::class, 'index'])->name('admin.contact.index');
        Route::post('/search', [AdminContactController::class, 'search'])->name('admin.contact.search');
        Route::delete('/delete/{id}', [AdminContactController::class, 'delete'])->name('admin.contact.delete');
    });

});

// router danh cho user
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
