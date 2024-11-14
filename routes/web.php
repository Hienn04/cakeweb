<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\ProductController;
use App\Http\Controllers\Website\CheckoutController;
use App\Http\Controllers\Admin\StatisticalController;
use App\Http\Controllers\Admin\CartController as AdminCartController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

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
    Route::get('/listCate/{id}', [ProductController::class, 'listCate'])->name('website.product.productCate');
    Route::get('/details/{id}', [ProductController::class, 'details'])->name('website.product.detail');

});



Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('website.post.index');
    Route::post('/search', [PostController::class, 'search'])->name('website.post.search');
    Route::get('/details/{id}', [PostController::class, 'details'])->name('website.post.details');
});




// Route For Admin

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/statistical', [StatisticalController::class, 'index'])->name('admin.statistical');
    Route::get('/accountant', [StatisticalController::class, 'getProfit'])->name('admin.accountant');

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

    Route::prefix('orders')->group(function () {
        Route::get('/', [AdminOrderController::class, 'index'])->name('admin.order.index');
        Route::post('/search', [AdminOrderController::class, 'search'])->name('admin.order.search');
        Route::post('/updateStatus', [AdminOrderController::class, 'updateStatus'])->name('admin.order.updateStatus');
        Route::delete('/delete/{id}', [AdminOrderController::class, 'delete'])->name('admin.order.delete');
    });

    Route::prefix('orders/details')->group(function () {
        Route::get('/{id}', [AdminOrderController::class, 'details'])->name('admin.order.details');
        Route::post('/search', [AdminOrderController::class, 'searchDetails'])->name('admin.order.searchDetails');
    });

});

// Route For User
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('cart.index');
        Route::post('/', [CartController::class, 'search'])->name('cart.search');
        Route::post('/searchLimit', [CartController::class, 'searchLimit'])->name('cart.searchLimit');
        Route::post('/add_to_cart', [CartController::class, 'addToCart'])->name('cart.add');
        Route::post('/update_cart', [CartController::class, 'updateCart'])->name('cart.update');
        Route::post('/getTotalProductInCart', [CartController::class, 'getTotalProductInCart'])->name('cart.getTotalProductInCart');
        Route::delete('/remove', [CartController::class, 'removeProduct'])->name('cart.remove');
    });

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/placeOrder', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
});

require __DIR__ . '/auth.php';
