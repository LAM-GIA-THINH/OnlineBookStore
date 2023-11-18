<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\PaymentResultComponent;
use App\Http\Livewire\ShopComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Livewire\DetailsComponent;
use App\Http\Controllers\CheckoutController;



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


Route::group(['prefix' => 'auth'], function () {
    Route::get('facebook', [AuthController::class, 'redirectToFacebook'])->name('auth.facebook');
    Route::get('facebook/callback', [AuthController::class, 'handleFacebookCallback']);
    
    Route::get('google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('google/callback', [AuthController::class, 'handleGoogleCallback']);
});

Route::group(['middleware' => ['userLogin', 'verified']], function() {
    Route::group(['middleware' => 'authAdmin'], function () {
        //admin
        Route::get('/admin/dashboard', \App\Http\Livewire\Admin\AdminDashBoardComponent::class)->name('admin.dashboard');
        Route::get('/admin/categories', \App\Http\Livewire\Admin\AdminCategoriesComponent::class)->name('admin.categories');
        Route::get('/admin/category/add', \App\Http\Livewire\Admin\AdminAddCategoryComponent::class)->name('admin.category.add');
        Route::get('/admin/category/edit/{category_id}', \App\Http\Livewire\Admin\AdminEditCategoryComponent::class)->name('admin.category.edit');
        Route::get('/admin/category/delete/{category_id}', \App\Http\Livewire\Admin\AdminDeleteCategoryComponent::class)->name('admin.category.delete');
    });
    //user
    Route::get('/user/dashboard', \App\Http\Livewire\User\UserDashBoardComponent::class)->name('user.dashboard');
    Route::post('/vnpay-payment', [CheckoutController::class, 'vnpayPayment'])->name('vnpay.payment');
    Route::get('/handle-vnpay-return', [CheckoutController::class, 'handleVNPayReturn'])->name('vnpay.return');
    Route::get('/payment-result', PaymentResultComponent::class)->name('payment.result.view');
});
Route::get('/',HomeComponent::class)-> name('home.index');
Route::get('/shop',ShopComponent::class)-> name('shop');
Route::get('/cart',CartComponent::class)-> name('shop.cart');
Route::get('/checkout',CheckoutComponent::class)-> name('shop.checkout');
Route::get('/product{slug}',DetailsComponent::class)-> name('product.details');
Route::get('/products{category_id}',DetailsComponent::class)-> name('product.detailss');
Route::get('/product-category/{slug}',App\Http\Livewire\CategoryComponent::class)-> name('product.category');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';