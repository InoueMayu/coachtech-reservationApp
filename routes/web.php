<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ReservationController;

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


Route::get('/', [StoreController::class, 'index'])->name('stores.index');
Route::get('/detail/{store_id}', [StoreController::class, 'show'])->name('stores.show');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/thanks', [App\Http\Controllers\HomeController::class, 'thanks'])->name('thanks');

Route::post('/done', [ReservationController::class, 'store'])->name('reservation.store');
Route::delete('/delete/{id}', [ReservationController::class, 'destroy'])->name('reservation.destroy');

Route::get('/mypage', [App\Http\Controllers\MyPageController::class, 'index'])->name('mypage');

Route::post('store/{id}/favorite', [App\Http\Controllers\FavoriteController::class, 'store'])->name('favorite');
Route::delete('store/{id}/unfavorite', [App\Http\Controllers\FavoriteController::class, 'destroy'])->name('unfavorite');
Route::delete('store/{id}/subunfavorite', [App\Http\Controllers\FavoriteController::class, 'delete'])->name('subunfavorite');
