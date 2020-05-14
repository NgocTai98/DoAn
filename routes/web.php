<?php

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
use Illuminate\Routing\RouteGroup;

//frontend
Route::get('', 'frontend\HomeController@getIndex');
Route::get('contact', 'frontend\HomeController@getContact');
Route::get('about', 'frontend\HomeController@getAbout');
Route::post('sendmail', 'frontend\HomeController@sendMail');
Route::group(['prefix' => 'product'], function () {
    Route::get('', 'frontend\ProductController@getShop');
    Route::get('detail/{id}', 'frontend\ProductController@getDetail');
});
Route::group(['prefix' => 'cart'], function () {

    Route::get('add', 'frontend\CartController@getAddCart');
    Route::get('del-cart/{id}', 'frontend\CartController@getDelCart');
    Route::get('update-cart/{rowId}/{qty}', 'frontend\CartController@getUpdateCart');
    Route::get('', 'frontend\CartController@getCart');
    Route::get('checkout', 'frontend\CartController@getCheckout');
    Route::post('checkout', 'frontend\CartController@postCheckout');
    Route::get('complete/{id}', 'frontend\CartController@getComplete');
    Route::get('email', 'frontend\CartController@email');
});
Route::get('login', 'backend\LoginController@getLogin')->middleware('checkLogout');
Route::post('login', 'backend\LoginController@postLogin');
//backend
Route::group(['prefix' => 'admin', 'middleware'=>'checkLogin'], function () {
    Route::get('', 'backend\HomeController@getIndex');
    Route::get('logout', 'backend\LoginController@getLogout');

    Route::get('excel', 'backend\ExcelController@export');
    Route::get('adv', 'backend\AdvController@Adv');
    Route::post('adv', 'backend\AdvController@postAdv');

    Route::group(['prefix' => 'product'], function () {
        Route::get('', 'backend\ProductController@getListProduct');
        Route::get('add', 'backend\ProductController@getAddProduct');
        Route::post('add', 'backend\ProductController@postAddProduct');
        Route::get('del-image', 'backend\ProductController@getDelImage');
        
        Route::group(['prefix' => 'edit'], function () {
            Route::get('/{id}', 'backend\ProductController@getEditProduct');
            Route::post('/{id}', 'backend\ProductController@postEditProduct');
            Route::get('/delete/{id}', 'backend\ProductController@delProduct');
            Route::get('/{id}/variant', 'backend\ProductController@getEditVariant')->middleware('checkRoleEditProduct');
        });

    });
    Route::group(['prefix' => 'category'], function () {
        Route::get('', 'backend\CategoryController@getListCategory');
        Route::post('', 'backend\CategoryController@postAddCategory');
        Route::get('edit/{idCate}', 'backend\CategoryController@getEditCategory');
        Route::post('edit/{idCate}', 'backend\CategoryController@postEditCategory');
        Route::get('del/{idCate}', 'backend\CategoryController@delCategory');
    });

    Route::group(['prefix' => 'order'], function () {
        Route::get('', 'backend\OrderController@getOrder');
        Route::get('detail/{id}', 'backend\OrderController@getDetailOrder');
        Route::get('active/{id}', 'backend\OrderController@activeOrder');
        Route::get('processed', 'backend\OrderController@getOrderProcessed');
        Route::get('export/{id}', 'backend\OrderController@getBill');
    });

    Route::group(['prefix' => 'provider'], function () {
        Route::get('', 'backend\ProviderController@getListProvider');
        Route::get('add', 'backend\ProviderController@getAddProvider');
        Route::post('add', 'backend\ProviderController@postAddProvider');
        Route::get('edit/{id}', 'backend\ProviderController@getEditProvider');
        Route::post('edit/{id}', 'backend\ProviderController@postEditProvider');
        Route::get('del/{id}', 'backend\ProviderController@getDelProvider');
    });

    Route::group(['prefix' => 'coupon'], function () {
        Route::get('', 'backend\CouponController@getListCoupon');
        Route::get('add', 'backend\CouponController@getAddCoupon');
        Route::post('add', 'backend\CouponController@postAddCoupon');
        Route::get('del/{id}', 'backend\CouponrController@getDelProvider');
        
    });
   
    Route::group(['prefix' => 'user', 'middleware'=>'checkRole'], function () {
        Route::get('', 'backend\UserController@getListUser');
        Route::get('add', 'backend\UserController@getAddUser');
        Route::post('add', 'backend\UserController@postAddUser');
        Route::get('edit/{idUser}', 'backend\UserController@getEditUser');
        Route::post('edit/{idUser}', 'backend\UserController@postEditUser');
        Route::get('del/{idUser}', 'backend\UserController@delUser');
    });
});