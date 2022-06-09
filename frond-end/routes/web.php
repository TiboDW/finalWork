<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DocumentController;

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

//Route::get('/', [PaperController::class, 'index'])->name('index');

Route::get('/', [DocumentController::class, 'home'])->name('index');


Auth::routes();

Route::get('/home', [DocumentController::class, 'index'])->name('index');

Route::get('user/{name}', [UserController::class, 'profile'])->name('profile');

Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('profileEdit');

Route::put('user/{id}/update', [UserController::class, 'update'])->name('profileUpdate');

Route::get('admin/{name}', [UserController::class, 'admin'])->name('admin');

Route::get('/about', [UserController::class, 'about'])->name('about');

Route::get('/contacts', [ContactController::class, 'contact'])->name('contact');

Route::put('/contacts/send', [ContactController::class, 'send'])->name('contactSend');

Route::resource('documents', DocumentController::class);

Route::resource('papers', PaperController::class);

Route::resource('questions', QuestionController::class);
