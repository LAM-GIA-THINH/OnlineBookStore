<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\User\UserPaymentResultComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\User\UserCheckoutComponent;
use App\Http\Livewire\User\UserOrdersComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
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
Route::group(['prefix' => 'auth'], function () {
    Route::get('facebook', [AuthController::class, 'redirectToFacebook'])->name('auth.facebook');
    Route::get('facebook/callback', [AuthController::class, 'handleFacebookCallback']);

    Route::get('google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('google/callback', [AuthController::class, 'handleGoogleCallback']);
});

Route::group(['middleware' => ['userLogin']], function () {
    Route::group(['middleware' => 'authAdmin'], function () {
        //admin
        Route::get('/admin/dashboard', \App\Http\Livewire\Admin\AdminDashBoardComponent::class)->name('admin.dashboard');
        Route::get('/admin/categories', \App\Http\Livewire\Admin\AdminCategoriesComponent::class)->name('admin.categories');
        Route::get('/admin/category/add', \App\Http\Livewire\Admin\AdminAddCategoryComponent::class)->name('admin.category.add');
        Route::get('/admin/category/edit/{category_id}', \App\Http\Livewire\Admin\AdminEditCategoryComponent::class)->name('admin.category.edit');
        Route::get('/admin/category/delete/{category_id}', \App\Http\Livewire\Admin\AdminDeleteCategoryComponent::class)->name('admin.category.delete');
        Route::get('/admin/authors', \App\Http\Livewire\Admin\AdminAuthorsComponent::class)->name('admin.authors');
        Route::get('/admin/author/add', \App\Http\Livewire\Admin\AdminAuthorAddComponent::class)->name('admin.author.add');
        Route::get('/admin/author/edit/{author_id}', \App\Http\Livewire\Admin\AdminAuthorEditComponent::class)->name('admin.author.edit');
        Route::get('/admin/author/delete/{author_id}', \App\Http\Livewire\Admin\AdminAuthorDeleteComponent::class)->name('admin.author.delete');
        Route::get('/admin/publishers', \App\Http\Livewire\Admin\AdminPublishersComponent::class)->name('admin.publishers');
        Route::get('/admin/publisher/add', \App\Http\Livewire\Admin\AdminPublisherAddComponent::class)->name('admin.publisher.add');
        Route::get('/admin/publisher/edit/{publisher_id}', \App\Http\Livewire\Admin\AdminPublisherEditComponent::class)->name('admin.publisher.edit');
        Route::get('/admin/publisher/delete/{publisher_id}', \App\Http\Livewire\Admin\AdminPublisherDeleteComponent::class)->name('admin.publisher.delete');
        Route::get('/admin/products', \App\Http\Livewire\Admin\AdminProductComponent::class)->name('admin.products');
        Route::get('/admin/product/add', \App\Http\Livewire\Admin\AdminProductAddComponent::class)->name('admin.product.add');
        Route::get('/admin/product/edit/{product_id}', \App\Http\Livewire\Admin\AdminProductEditComponent::class)->name('admin.product.edit');
        Route::get('/admin/product/delete/{product_id}', \App\Http\Livewire\Admin\AdminProductDeleteComponent::class)->name('admin.product.delete');
        Route::get('/admin/orders', \App\Http\Livewire\Admin\AdminOrdersComponent::class)->name('admin.orders');
        Route::get('/admin/order/edit/{order_id}', \App\Http\Livewire\Admin\AdminOrderEditComponent::class)->name('admin.order.edit');
    });
    //user
    Route::group(['prefix'=> 'user'], function () {
        Route::get('profile', [ProfileController::class, 'edit'])->name('user.profile.edit');
        Route::put('profile', [ProfileController::class, 'update'])->name('user.profile.update');
        Route::get('orders', UserOrdersComponent::class)->name('user.orders');
        Route::post('place-order', [CheckoutController::class, 'payment'])->name('user.payment');
        Route::get('order-detail/{order_id}', [OrderController::class, 'show'])->name('user.order_detail');
        Route::post('order-cancel/{order_id}', [OrderController::class, 'cancel'])->name('user.order_cancel');
        Route::get('checkout', UserCheckoutComponent::class)->name('user.checkout');
        Route::get('payment-result', UserPaymentResultComponent::class)->name('user.payment_result');
    });
});

Route::get('/', HomeComponent::class)->name('home.index');
Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/cart', CartComponent::class)->name('shop.cart');
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/products{category_id}', DetailsComponent::class)->name('product.detailss');
Route::get('/product-category/{slug}', App\Http\Livewire\CategoryComponent::class)->name('product.category');
Route::get('/search', App\Http\Livewire\SearchComponent::class)->name('product.search');
Route::get('/About', App\Http\Livewire\AboutComponent::class)->name('about');
Route::get('/Blog', App\Http\Livewire\BlogComponent::class)->name('blog');
Route::get('/wishlist', App\Http\Livewire\WishlistComponent::class)->name('shop.wishlist');

Route::get('/handle-vnpay-return', [CheckoutController::class, 'handleVNPayReturn'])->name('vnpay.return');

require __DIR__ . '/auth.php';