<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacebookController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',\App\Http\Livewire\HomeComponent::class)->name('dashboard');
Route::get('/shop',\App\Http\Livewire\ShopComponent::class)->name('shop');
Route::get('/cart',\App\Http\Livewire\CartComponent::class)->name('shop.cart');
Route::get('/checkout',\App\Http\Livewire\CheckoutComponent::class)->name('shop.checkout');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware(['auth','authadmin'])->group (function(){
    Route::get('/admin/dashboard', \App\Http\Livewire\Admin\AdminDashBoardComponent::class)->name('admin.dashboard');
});

Route::middleware(['auth'])->group (function(){
    Route::get('/user/dashboard', \App\Http\Livewire\User\UserDashBoardComponent::class)->name('user.dashboard');
});

Route::controller(FacebookController::class)->group(function(){
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
