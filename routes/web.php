<?php

use App\Http\Controllers\AddToCart;
use App\Http\Controllers\Auth\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FrontnendSettingController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductRatingController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SocialAccountController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\UserDetailsController;
use App\Http\Controllers\WhitelistController;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\InvoicePaid;


// Route::get('/', function () {
//     return view('welcome');
// });

//login Controller start
Auth::routes();

//Google login
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle'])->name('callbackGoogle');

//Fb login 
Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

//Admin User Login 
Route::get('/profile', [HomeController::class, 'index'])->name('home');
Route::post('profile', [UserDetailsController::class, 'updateUserDetails'])->name('store.user.details');
Route::post('user-password', [UserDetailsController::class, 'updatePassword'])->name('update.password');

//Admin Controller Start
Route::get('/admin', [LoginController::class, 'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin', [LoginController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin/register', [RegisterController::class, 'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register', [RegisterController::class, 'createAdmin'])->name('admin.register');
Route::get('/admin/dashboard', function () {

    $orders = Order::all();
    $products = Product::all();
    return view('admin', ['orders' => $orders,'products'=>$products]);
})->name('admin')->middleware('auth:admin');
Route::get('/admin/profile', [AdminController::class, 'showAdminProfile'])->name('admin.profile')->middleware('auth:admin');
Route::post('/admin/profile', [AdminController::class, 'updateAdminDetails'])->name('update.profile.details');
Route::post('admin-password', [AdminController::class, 'updateAdminPassword'])->name('update.admin.password');

//Category Controller Start
Route::get('admin/list/category', [CategoryController::class, 'categoryList'])->name('category.list');
Route::get('admin/category/add', [CategoryController::class, 'categoryAdd'])->name('category.add');
Route::post('admin/category/store', [CategoryController::class, 'categoryStore'])->name('category.store');
Route::get('admin/category/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
Route::post('admin/category/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('category.update');
Route::get('admin/category/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');

//Brand Controller Start
Route::get('admin/list/brand', [BrandController::class, 'brandList'])->name('brand.list');
Route::get('admin/brand/add', [BrandController::class, 'brandAdd'])->name('brand.add');
Route::post('admin/brand/store', [BrandController::class, 'brandStore'])->name('brand.store');
Route::get('admin/brand/edit/{id}', [BrandController::class, 'brandEdit'])->name('brand.edit');
Route::post('admin/brand/update/{id}', [BrandController::class, 'brandUpdate'])->name('brand.update');
Route::get('admin/brand/delete/{id}', [BrandController::class, 'brandDelete'])->name('brand.delete');

//Brand Controller Start
Route::get('admin/list/product', [ProductController::class, 'productList'])->name('product.list');
Route::get('admin/product/add', [ProductController::class, 'productAdd'])->name('product.add');
Route::post('admin/product/store', [ProductController::class, 'productStore'])->name('product.store');
Route::get('admin/product/edit/{id}', [ProductController::class, 'productEdit'])->name('product.edit');
Route::post('admin/product/update/{id}', [ProductController::class, 'productUpdate'])->name('product.update');
Route::get('admin/product/delete/{id}', [ProductController::class, 'productDelete'])->name('product.delete');

//Frontend Setting Controller Start
Route::get('admin/frontend/setting',[FrontnendSettingController::class, 'frontendSetting'])->name('frontend.setting');
Route::post('admin/frontend/setting/update/{id}',[FrontnendSettingController::class, 'frontendSettingUpdate'])->name('frontend.setting.update');

// Social Account Controller Start
Route::get('admin/social-account', [SocialAccountController::class, 'showSocialAccount'])->name('show.social.account');
Route::post('admin/social-account', [SocialAccountController::class, 'socialAccountStore'])->name('scocial.account.store');
Route::get('admin/social-account/{id}', [SocialAccountController::class, 'socialAccountEdit'])->name('scocial.account.edit');
Route::post('admin/social-account/{id}', [SocialAccountController::class, 'socialAccountUpdate'])->name('scocial.account.update');
Route::get('admin/social-account/delete/{id}', [SocialAccountController::class, 'socialAccountDelete'])->name('scocial.account.delete');

//Frontend  Controller Start
Route::get('/', [FrontendController::class, 'homePage'])->name('home.page');
Route::get('/shop', [FrontendController::class, 'shopPage'])->name('shop.page');
Route::get('shoping-cart', [FrontendController::class, 'shopingCartPage'])->name('shoping.cart.page');
Route::get('shop-details/{slug}', [FrontendController::class, 'shopDetailsPage'])->name('shop.details.page');
Route::get('category/{slug}', [FrontendController::class, 'categoryPage'])->name('category.page');
Route::get('blog/{slug}', [FrontendController::class, 'blogCategoryPage'])->name('blog.page.category');
Route::get('blog-details/{slug}', [FrontendController::class, 'blogDetailsPage'])->name('blog.details.page');
Route::get('blog', [FrontendController::class, 'blogPage'])->name('blog.page');
Route::get('contact', [FrontendController::class, 'contactPage'])->name('contact.page');

//Add to cart controller
Route::get('cart', [AddToCart::class, 'cart'])->name('cart')->middleware('auth');
Route::post('add-to-cart/{id}', [AddToCart::class, 'addToCart'])->name('add.to.cart')->middleware('auth');;
Route::patch('update-cart', [AddToCart::class, 'update'])->name('update.cart')->middleware('auth');;
Route::delete('remove-from-cart', [AddToCart::class, 'remove'])->name('remove.from.cart')->middleware('auth');;
//WhiteList Controller
Route::get('white-list', [WhitelistController::class, 'whiteList'])->name('whiteList')->middleware('auth');
Route::post('white-list/{id}', [WhitelistController::class, 'addToWhiteList'])->name('add.to.whiteList')->middleware('auth');;
Route::patch('update-white-list', [WhitelistController::class, 'update'])->name('update.whiteList')->middleware('auth');;
Route::delete('remove-white-list', [WhitelistController::class, 'remove'])->name('remove.whiteList')->middleware('auth');;
Route::get('clear-white-list', [WhitelistController::class, 'clearList'])->name('clear.list')->middleware('auth');;
//Cheack Out Controller 
Route::get('checkout', [FrontendController::class, 'checkoutPage'])->name('checkout.page')->middleware('auth');
Route::post('coupon', [FrontendController::class, 'Coupon'])->name('coupon.page')->middleware('auth');

//Order controller
Route::get('admin/list/order', [OrderController::class, 'orderList'])->name('order.list');
Route::get('order/details/{id}', [OrderController::class, 'orderDetails'])->name('order.details');
Route::post('order', [OrderController::class, 'order'])->name('order');
Route::get('my/order', [OrderController::class, 'myOrder'])->name('my.order');
Route::get('my/order/edit/{id}', [OrderController::class, 'myOrderEdit'])->name('my.order.edit');
Route::patch('my/order/update', [OrderController::class, 'updateMyOrder'])->name('update.myorder');
Route::delete('my/order/remove', [OrderController::class, 'orderRemove'])->name('order.remove');

//Invoice Controller 
Route::get('invoice/{id}', [InvoiceController::class, 'Invoice'])->name('invoice');
Route::get('invoice-download/{id}', [InvoiceController::class, 'invoiceDownload'])->name('invoice.download');


//Shiping update controller
Route::post('order/status-update', [OrderController::class, 'orderStatusUpdate'])->name('order.status.update');

//Payment controller 
Route::controller(StripePaymentController::class)->group(function () {
    Route::get('stripe', 'stripe')->name('stripe');
    Route::get('stripe/{id}', 'stripeID')->name('stripe.id');
    Route::post('stripe', 'handleWebhook')->name('stripe.post');
});

//Search controller 
Route::get('search', [SearchController::class, 'searchResault'])->name('search');
Route::get('shop-search', [SearchController::class, 'shopFilter'])->name('search.shop');
Route::get('/products/sort', [SearchController::class, 'shortBy'])->name('short.by');
Route::get('/category/sort/{slug}', [SearchController::class, 'shortByCategory'])->name('short.by.category');

// Rating Add Controller
Route::post('product/rating', [ProductRatingController::class, 'ratingAdd'])->name('rating.add')->middleware('auth');

// Frontend  Controller end


//Mail  Controller 
Route::post('send-mail', [MailController::class, 'index'])->name('send.mail');

// Notifications
Route::get('send-noti', function (){
    $user = User::find(1);
    $user->notify(new InvoicePaid($user));

});

// news lettter 

Route::post('newsletter/store',[NewsletterController::class , 'store'])->name('news.letter');
