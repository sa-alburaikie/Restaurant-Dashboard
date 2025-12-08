<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::group(['middleware' => 'checkadmin'], function () {
    Route::get('users', [AdminController::class, 'getUsers'])->name('getUsers');
    Route::get('delete-user/{user_id}', [AdminController::class, 'deleteUser'])->name('deleteUser');
    Route::get('food-menu', [AdminController::class, 'foodMenu'])->name('food.menu');
    Route::post('add-food', [AdminController::class, 'addFood'])->name('addFood');
    Route::get('delete-menu/{id}', [AdminController::class, 'deleteMenu'])->name('deleteMenu');
    Route::get('update-menu/{id}', [AdminController::class, 'updateMenu'])->name('updateMenu');
    Route::post('update/{id}', [AdminController::class, 'update'])->name('update');
    Route::get('view-reservation', [AdminController::class, 'viewReservation'])->name('viewReservation');
    Route::get('view-chefs', [AdminController::class, 'viewChefs'])->name('viewChefs');
    Route::post('add-chef', [AdminController::class, 'addChef'])->name('addChef');
    Route::get('remove-chef/{id}', [AdminController::class, 'removeChef'])->name('removeChef');
    Route::get('update-chef/{id}', [AdminController::class, 'updateChef'])->name('updateChef');
    Route::post('update-chef-info/{id}', [AdminController::class, 'updateChefInfo'])->name('updateChefInfo');
    Route::get('orders', [AdminController::class, 'showOrders'])->name('showOrders');
    Route::get('search-orders', [AdminController::class, 'searchOrders'])->name('searchOrders');
});


Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('redirects', [HomeController::class, 'redirects'])->name('redirects');
Route::post('make-reservation', [HomeController::class, 'makeReservation'])->name('makeReservation');
Route::post('add-to-cart/{id}', [HomeController::class, 'addToCart'])->name('addToCart');
Route::get('show-cart/{id}', [HomeController::class, 'showCart'])->name('showCart');
Route::get('remove-from-cart/{id}', [HomeController::class, 'removeFromCart'])->name('removeFromCart');
Route::post('order-confirm', [HomeController::class, 'confirmOrder'])->name('confirmOrder');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

