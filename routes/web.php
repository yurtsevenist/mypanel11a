<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
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
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/forget', function () {
    return view('forget');
});
Route::post('loginPost',[Controller::class,'loginPost'])->name('loginPost');
Route::post('registerPost',[Controller::class,'registerPost'])->name('registerPost');
Route::get('login',[Controller::class,'login'])->name('login');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('dashboard',[Controller::class,'dashboard'])->name('dashboard');
    Route::get('blog',[Controller::class,'blog'])->name('blog');
    Route::get('blog/blogdetail/{id}',[Controller::class,'blogdetail'])->name('blogdetail');
    Route::post('blogDelete',[Controller::class,'blogDelete'])->name('blogDelete');
    Route::get('logout',[Controller::class,'logout'])->name('logout');
    Route::get('modeswitch', [Controller::class, 'modeswitch'])->name('modeswitch');

});