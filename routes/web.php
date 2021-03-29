<?php

use App\Http\Controllers\ShopController;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
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

//Route::get('/refresh_captcha', 'Auth\RegisterController@refreshCaptcha')->name('refresh');
#home page
Route::get('/', 'IndexPageController@index')->name('index');
#shop page
Route::get('/shop', 'ShopController@index')->name('shop.index');
#product-details page
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');

# add to cart page
Route::get('/shop-cart', 'CartController@index')->name('cart.index');
Route::post('/shop-cart', 'CartController@store')->name('cart.store');
Route::patch('/shop-cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('/shop-cart/{product}', 'CartController@destroy')->name('cart.destroy');

Route::post('/shop-cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

# add to cart save items in later
Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/switchToSaveForLater/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

# coupons code

Route::post('/coupon', 'CouponsController@store')->name('coupon.stroe');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');
# Checkout page  start in the funct

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');


#checkout as Gust Account

Route::get('/guestCheckout', 'CheckoutController@index')->name('guestCheckout.index');



#Route::get('/shop-cart', function () {return view('shop-cart');});
# shopping page 
//Route::get('/shop', function () {
//    return view('shop');
//});

Route::get('/blog', function () {
    return view('blog');
});
Route::get('/blog-details', function () {
    return view('blog-details');
});

Route::get('/product-details', function () {
    return view('product-details');
});

Route::get('/contact', function () {
    return view('contact');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/search', 'ShopController@search')->name('search');
