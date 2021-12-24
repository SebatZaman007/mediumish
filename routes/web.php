<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use Intervention\Image\ImageManagerStatic;


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
//     $img = ImageManagerStatic ::make('test.png')->resize(300, 200);

//     return $img->response('png');
// });

// frontend

Route::get('/',[BlogController::class,'index'])->name('index');
Route::get('/stories',[BlogController::class,'addStories'])->name('add.stories');



//backend

Route::get('/login',[BlogController::class,'blogLogin'])->name('blog.login');
Route::get('/create',[BlogController::class,'blogCreate'])->name('blog.create');
Route::post('/create',[BlogController::class,'blogStore'])->name('blog.store');
Route::get('/edit/{id}',[BlogController::class,'blogEdit'])->name('blog.edit');
Route::post('/update',[BlogController::class,'blogUpdate'])->name('blog.update');
Route::get('/delete/{id}',[BlogController::class,'blogDelete'])->name('blog.delete');
