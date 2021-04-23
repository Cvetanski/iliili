<?php

use App\Http\Controllers\About\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Author\AuthorController;
use App\Http\Controllers\BookController\BookController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Categories\CategoriesController;
use App\Http\Controllers\CKEditorController\CKEditorController;
use App\Http\Controllers\Coupon\CouponController;
use App\Http\Controllers\Delivery\DeliveryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Index\IndexController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\User\UserController;
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

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('admin.dashboard');

require __DIR__.'/auth.php';


Route::get('logout',[AdminController::class,'logout']);
Route::get('admin-profile',[AdminController::class,'adminProfile']);
Route::post('new-password',[AdminController::class,'newPassword']);

//About Routes
Route::middleware(['auth.admin'])->group(function() {
    Route::get('/add-about', [AboutController::class, 'index'])->name('add-about');
    Route::post('/save-about', [AboutController::class, 'saveAbout'])->name('save-about');
    Route::get('/unactive-about/{id}', [AboutController::class, 'unactiveAbout'])->name('unactive-about');
    Route::get('/active-about/{id}', [AboutController::class, 'activeAbout'])->name('active-about');
    Route::get('/edit-about/{id}', [AboutController::class, 'editAbout'])->name('edit-about');
    Route::post('/update-about{id}', [AboutController::class, 'updateAbout'])->name('update-about');
    Route::get('/delete-about/{id}', [AboutController::class, 'deleteAbout'])->name('delete-about');
    Route::get('/all-about', [AboutController::class, 'allAbout'])->name('all-about');
});

//Book Routes
//Route::middleware(['auth.admin'])->group(function() {
    Route::get('/add-book', [BookController::class, 'index'])->name('add-book');
    Route::post('/save-book', [BookController::class, 'saveBook'])->name('save-book');
    Route::get('/all-book', [BookController::class, 'allBook'])->name('all-book');
    Route::get('/unactive-book/{id}', [BookController::class, 'unactiveBook'])->name('unactive-book');
    Route::get('/active-book/{id}', [BookController::class, 'activeBook'])->name('active-book');
    Route::get('/edit-book/{id}', [BookController::class, 'editBook'])->name('edit-book');
    Route::post('/update-book/{id}', [BookController::class, 'updateBook'])->name('update-book');
    Route::get('/delete-book/{id}', [BookController::class, 'deleteBook'])->name('delete-book');
//});


//Author Routes
Route::middleware(['auth.admin'])->group(function(){
  Route::get('/add-author',[AuthorController::class,'index'])->name('add-author');
  Route::post('/save-author',[AuthorController::class,'saveAuthor'])->name('save-author');
  Route::get('/all-author',[AuthorController::class,'allAuthor'])->name('all-author');
  Route::get('/edit-author/{id}',[AuthorController::class,'editAuthor'])->name('edit-author');
  Route::post('/update-author/{id}',[AuthorController::class,'updateAuthor'])->name('update-author');
  Route::get('delete-author/{id}',[AuthorController::class,'deleteAuthor'])->name('delete-author');
});


//Categories Routes

Route::middleware(['auth.admin'])->group(function(){
    Route::get('/add-category',[CategoriesController::class,'index'])->name('add-category');
    Route::post('/save-category',[CategoriesController::class,'saveCategory'])->name('save-category');
    Route::get('/all-category',[CategoriesController::class,'allCategory'])->name('all-category');
    Route::get('/edit-category/{id}',[CategoriesController::class,'editCategory'])->name('edit-category');
    Route::post('/update-category/{id}',[CategoriesController::class,'updateCategory'])->name('update-category');
    Route::get('delete-category/{id}',[CategoriesController::class,'deleteCategory'])->name('delete-category');
});

//Coupon Routes
Route::middleware(['auth.admin'])->group(function(){
Route::get('/add-coupon',[CouponController::class,'index'])->name('add-coupon');
Route::post('/save-coupon',[CouponController::class,'store'])->name('save-coupon');
Route::get('all-coupon',[CouponController::class,'allCoupon'])->name('all-coupon');
Route::get('edit-coupon/{id}',[CouponController::class,'edit'])->name('edit-coupon');
Route::get('delete-coupon/{id}',[CouponController::class,'delete'])->name('delete-coupon');
Route::post('update-coupon/{id}',[CouponController::class,'update'])->name('update-coupon');
});

//Delivery Routes
Route::middleware(['auth.admin'])->group(function() {
    Route::get('add-delivery', [DeliveryController::class, 'index'])->name('add-delivery');
    Route::post('/save-delivery', [DeliveryController::class, 'store'])->name('save-delivery');
    Route::get('all-delivery', [DeliveryController::class, 'allDelivery'])->name('all-delivery');
    Route::get('edit-delivery/{id}', [DeliveryController::class, 'edit'])->name('edit-delivery');
    Route::post('update-delivery/{id}', [DeliveryController::class, 'update'])->name('update-delivery');
    Route::get('delete-delivery/{id}', [DeliveryController::class, 'delete'])->name('delete-delivery');
});

//Order Routes
Route::middleware(['auth.admin'])->group(function(){
Route::get('all-order',[OrderController::class,'index'])->name('all-order');
Route::post('delete-order',[OrderController::class,'index'])->name('delete-order');
});

//FRONTEND ROUTES
Route::get('/',[HomeController::class,'index']);
Route::get('/book-detail/{id}',[IndexController::class,'bookDetail']);
Route::get('shop',[IndexController::class,'shop']);
Route::get('product-detail/{slug}',[FrontendController::class,'productDetail'])->name('product-detail');

Route::get('/',[IndexController::class,'index']);

//User Routes
Route::get('login-page',[UserController::class,'index'])->name('login-page');
Route::post('create-account',[UserController::class,'register'])->name('create-account');
Route::post('login-user',[UserController::class,'login'])->name('login-user');
Route::get('my-account',[UserController::class,'userAccount'])->name('my-account');

Route::get('shop',[ShopController::class,'index'])->name('shop');
Route::match(['get','post'],'/filter','FrontendController@productFilter')->name('shop.filter');
Route::get('product-detail',[ProductController::class,'index'])->name('product-detail');




//Cart Routes
Route::get('/cart',function(){
    return view('frontend.cart');
})->name('cart');
Route::get('add-to-cart/{slug}',[CartController::class,'addToCart'])->name('addToCart');;
Route::post('/add-to-cart',[CartController::class,'singleAddToCart'])->name('single-add-to-cart');
Route::get('cart-delete/{id}',[CartController::class,'delete'])->name('cart-delete');
Route::post('cart-update',[CartController::class,'update'])->name('cart-update');
Route::get('checkout',[CartController::class,'checkout'])->middleware(['user'])->name('checkout');




//CkEditorController
Route::post('ckeditor/image_upload', [CKEditorController::class, 'upload'])->name('upload');
