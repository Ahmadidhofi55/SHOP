<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\MetodePembayaranController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;

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



/* Route::get('/user', function(){
    return view('users.index');
})->name('user'); */


Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::middleware(['auth'])->group(function () {
    Route::resource('produk',ProdukController::class);
    Route::resource('user',UserController::class);
    Route::resource('merek',MerekController::class);
    Route::resource('kategori',KategoriController::class);
    Route::resource('wallet',MetodePembayaranController::class);
    Route::resource('order',OrderController::class);
});
