<?php

use App\Http\Controllers\About\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BookController\BookController;
use App\Http\Controllers\CKEditorController\CKEditorController;
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


Route::get('/add-about',[AboutController::class,'index'])->middleware(['auth'])->name('add-about');
//Route::get('/',[AboutController::class,'index'])->middleware(['auth'])->name('all_about');
Route::post('/save-about',[AboutController::class,'saveAbout'])->middleware(['auth'])->name('save-about');
Route::get('/unactive-about/{id}',[AboutController::class,'unactiveAbout'])->middleware(['auth'])->name('unactive-about');
Route::get('/active-about/{id}',[AboutController::class,'activeAbout'])->middleware(['auth'])->name('active-about');
Route::get('/edit-about/{id}',[AboutController::class,'editAbout'])->middleware(['auth'])->name('edit-about');
Route::post('/update-about{id}',[AboutController::class,'updateAbout'])->middleware(['auth'])->name('update-about');
Route::get('/delete-about/{id}',[AboutController::class,'deleteAbout'])->name('delete-about');
Route::get('/all-about',[AboutController::class,'allAbout'])->middleware(['auth'])->name('all-about');



Route::get('add-book',[BookController::class,'index'])->middleware(['auth'])->name('add-book');
Route::post('save-book',[BookController::class,'saveBook'])->middleware(['auth'])->name('save-book');
Route::get('all-book',[BookController::class,'allBook'])->middleware(['auth'])->name('all-book');
//Route::get('unactive-book/{id}',[BookController::class,'unactiveBook'])->middleware(['auth'])->name('unactive-book');
Route::get('edit-book/{id}',[BookController::class,'editBook'])->middleware(['auth'])->name('edit-book');
Route::get('/delete-book/{id}',[BookController::class,'deleteBook'])->middleware(['auth'])->name('delete-book');
//Route::get('/active-book/{id}',[BookController::class,'activeBook'])->middleware(['auth'])->name('active-about');
//Route::get('unactive-book/{id}',[BookController::class,])

Route::post('ckeditor/image_upload', [CKEditorController::class, 'upload'])->name('upload');
