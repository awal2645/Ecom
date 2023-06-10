<?php

use App\Http\Controllers\AddToCart;
use App\Http\Controllers\Auth\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\UserDetailsController;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

//login Controller start
Auth::routes();

//google login
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle'])->name('callbackGoogle');

// fb login 
Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
// Admin User Login 
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('profile', [UserDetailsController::class, 'updateUserDetails'])->name('store.user.details');
Route::post('user-password', [UserDetailsController::class, 'updatePassword'])->name('update.password');
// Admin Controller Start
Route::get('/admin', [LoginController::class, 'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin', [LoginController::class, 'adminLogin'])->name('admin.login');

Route::get('/admin/register', [RegisterController::class, 'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register', [RegisterController::class, 'createAdmin'])->name('admin.register');
Route::get('/admin/dashboard', function () {
    return view('admin');
})->name('admin')->middleware('auth:admin');
Route::get('/admin/profile', [AdminController::class, 'showAdminProfile'])->name('admin.profile')->middleware('auth:admin');
Route::post('/admin/profile', [AdminController::class, 'updateAdminDetails'])->name('update.profile.details');
Route::post('admin-password', [AdminController::class, 'updateAdminPassword'])->name('update.admin.password');

// Frontend  Controller start
Route::get('/', [FrontendController::class, 'homePage'])->name('home.page');
Route::get('/shop', [FrontendController::class, 'shopPage'])->name('shop.page');
Route::get('shoping-cart', [FrontendController::class, 'shopingCartPage'])->name('shoping.cart.page');
Route::get('shop-details/{slug}', [FrontendController::class, 'shopDetailsPage'])->name('shop.details.page');
Route::get('category/{slug}', [FrontendController::class, 'categoryPage'])->name('category.page');
Route::get('blog/{slug}', [FrontendController::class, 'blogCategoryPage'])->name('blog.page.category');
Route::get('blog-details/{slug}', [FrontendController::class, 'blogDetailsPage'])->name('blog.details.page');
Route::get('blog', [FrontendController::class, 'blogPage'])->name('blog.page');
Route::get('contact', [FrontendController::class, 'contactPage'])->name('contact.page');

//add to cart controller
Route::get('cart', [AddToCart::class, 'cart'])->name('cart')->middleware('auth');
Route::post('add-to-cart/{id}', [AddToCart::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [AddToCart::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [AddToCart::class, 'remove'])->name('remove.from.cart');
Route::get('checkout', [FrontendController::class, 'checkoutPage'])->name('checkout.page')->middleware('auth');
Route::post('coupon', [FrontendController::class, 'Coupon'])->name('coupon.page')->middleware('auth');

//order controller
Route::get('order/list', [OrderController::class, 'orderList'])->name('order.list');
Route::post('order', [OrderController::class, 'order'])->name('order');
Route::get('my/order', [OrderController::class, 'myOrder'])->name('my.order');
Route::get('my/order/edit/{id}', [OrderController::class, 'myOrderEdit'])->name('my.order.edit');
Route::patch('my/order/update', [OrderController::class, 'updateMyOrder'])->name('update.myorder');
Route::delete('my/order/remove', [OrderController::class, 'orderRemove'])->name('order.remove');

// shiping update controller
Route::post('order/status-update', [OrderController::class, 'orderStatusUpdate'])->name('order.status.update');

// payment controller 
Route::controller(StripePaymentController::class)->group(function () {
    Route::get('stripe', 'stripe')->name('stripe');
    Route::get('stripe/{id}', 'stripeID')->name('stripe.id');
    Route::post('stripe', 'handleWebhook')->name('stripe.post');
});

//search controller 
Route::get('search', [SearchController::class, 'searchResault'])->name('search');
Route::get('shop-search', [SearchController::class, 'shopFilter'])->name('search.shop');
Route::get('/products/sort', [SearchController::class, 'shortBy'])->name('short.by');
Route::get('/category/sort/{slug}', [SearchController::class, 'shortByCategory'])->name('short.by.category');
// Frontend  Controller end

