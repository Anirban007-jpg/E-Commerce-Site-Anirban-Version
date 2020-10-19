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

Route::get('/', 'Frontend\FrontendController@index')->name('/home');
Route::get('/about-us', 'Frontend\FrontendController@aboutUs')->name('about.us');
Route::get('/contact-us', 'Frontend\FrontendController@contactUs')->name('contact.us');
Route::get('/shopping-cart', 'Frontend\FrontendController@ShoppingCart')->name('shopping.cart');
Route::post('/contact/store', 'Frontend\FrontendController@store')->name('contact.store');
Route::get('/product-list', 'Frontend\FrontendController@productlist')->name('product.list');
Route::get('/product-category/{category_id}', 'Frontend\FrontendController@categorywiseproduct')->name('category.wise.product');
Route::get('/product-brand/{brand_id}', 'Frontend\FrontendController@brandwiseproduct')->name('brand.wise.product');
Route::get('/product-details/{slug}', 'Frontend\FrontendController@productdetails')->name('product.details.info');


// Shopping Cart Routes
Route::post('/add-to-cart','Frontend\CartController@addtoCart')->name('cart.add');
Route::get('/show-cart','Frontend\CartController@showCart')->name('cart.show');
Route::post('/update-cart','Frontend\CartController@updateCart')->name('cart.update');
Route::get('/delete-cart/{rowId}','Frontend\CartController@deleteCart')->name('cart.delete');


Route::get('/customer-login','Frontend\CheckOutController@login')->name('customer.login');
Route::get('/customer-signup','Frontend\CheckOutController@signup')->name('customer.signup');
Route::post('/customer-signup-store','Frontend\CheckOutController@signupStore')->name('customer.signup.store');
Route::get('/email-verify','Frontend\CheckOutController@emailVerify')->name('email.verify');
Route::post('/verify-store','Frontend\CheckOutController@verifyStore')->name('verify.store');
Route::get('/checkout','Frontend\CheckOutController@checkout')->name('customer.checkout');
Route::post('/checkout-store','Frontend\CheckOutController@checkoutStore')->name('customer.checkout.store');


Auth::routes();

//Customer Dashboard
Route::group(['middleware'=>['auth','customer']], function (){
    Route::get('/dashboard','Frontend\DashboardController@dashboard')->name('dashboard');
    Route::get('/customer-edit-profile','Frontend\DashboardController@editProfile')->name('customer.edit.profile');
    Route::post('/customer-update-profile','Frontend\DashboardController@updateProfile')->name('customer.update.profile');
    Route::get('/customer-password-change','Frontend\DashboardController@passwordChange')->name('customer.password.change');
    Route::post('/customer-password-update','Frontend\DashboardController@passwordUpdate')->name('customer.password.update');
    Route::get('/payment','Frontend\DashboardController@payment')->name('customer.payment');
    Route::post('/payment/store','Frontend\DashboardController@paymentStore')->name('customer.payment.store');
    Route::get('/order-list','Frontend\DashboardController@orderList')->name('customer.order.list');
    Route::get('/order-details/{id}','Frontend\DashboardController@orderDetails')->name('customer.order.details');
    Route::get('/order-print/{id}','Frontend\DashboardController@orderPrint')->name('customer.order.print');
});


Route::group(['middleware'=>['auth','admin']], function (){
    //Admin Dashboard
    Route::get('/home', 'HomeController@index')->name('home');
    Route::prefix('users')->group(function (){
        Route::get('/view', 'Backend\UserController@View')->name('users.view');
        Route::get('/add', 'Backend\UserController@Add')->name('users.add');
        Route::post('/store', 'Backend\UserController@Store')->name('users.store');
        Route::get('/edit/{id}', 'Backend\UserController@Edit')->name('users.edit');
        Route::post('/update/{id}', 'Backend\UserController@Update')->name('users.update');
        Route::get('/delete/{id}', 'Backend\UserController@Delete')->name('users.delete');
    });

    Route::prefix('profiles')->group(function (){
        Route::get('/view', 'Backend\ProfileController@view')->name('profiles.view');
        Route::get('/edit', 'Backend\ProfileController@edit')->name('profiles.edit');
        Route::post('/store', 'Backend\ProfileController@update')->name('profiles.update');
        Route::get('/password/view', 'Backend\ProfileController@passwordview')->name('profiles.password.view');
        Route::post('/password/update', 'Backend\ProfileController@passwordupdate')->name('profiles.password.update');

    });

    Route::prefix('sliders')->group(function (){
        Route::get('/view', 'Backend\SliderController@ViewSlider')->name('sliders.view');
        Route::get('/add', 'Backend\SliderController@AddSlider')->name('sliders.add');
        Route::post('/store', 'Backend\SliderController@StoreSlider')->name('sliders.store');
        Route::get('/edit/{id}', 'Backend\SliderController@EditSlider')->name('sliders.edit');
        Route::post('/update/{id}', 'Backend\SliderController@UpdateSlider')->name('sliders.update');
        Route::get('/delete/{id}', 'Backend\SliderController@DeleteSlider')->name('sliders.delete');
    });

    Route::prefix('logos')->group(function (){
        Route::get('/view', 'Backend\LogoController@ViewLogo')->name('logos.view');
        Route::get('/add', 'Backend\LogoController@AddLogo')->name('logos.add');
        Route::post('/store', 'Backend\LogoController@StoreLogo')->name('logos.store');
        Route::get('/edit/{id}', 'Backend\LogoController@EditLogo')->name('logos.edit');
        Route::post('/update/{id}', 'Backend\LogoController@UpdateLogo')->name('logos.update');
        Route::get('/delete/{id}', 'Backend\LogoController@DeleteLogo')->name('logos.delete');
    });


    Route::prefix('contacts')->group(function (){
        Route::get('/view', 'Backend\ContactController@view')->name('contacts.view');
        Route::get('/add', 'Backend\ContactController@add')->name('contacts.add');
        Route::post('/store', 'Backend\ContactController@store')->name('contacts.store');
        Route::get('/edit/{id}', 'Backend\ContactController@edit')->name('contacts.edit');
        Route::post('/update/{id}', 'Backend\ContactController@update')->name('contacts.update');
        Route::get('/delete/{id}', 'Backend\ContactController@delete')->name('contacts.delete');
        Route::get('/communicate', 'Backend\ContactController@viewCommunicate')->name('contacts.communicate.view');
    });

    Route::prefix('abouts')->group(function (){
        Route::get('/view', 'Backend\AboutController@view')->name('abouts.view');
        Route::get('/add', 'Backend\AboutController@add')->name('abouts.add');
        Route::post('/store', 'Backend\AboutController@store')->name('abouts.store');
        Route::get('/edit/{id}', 'Backend\AboutController@edit')->name('abouts.edit');
        Route::post('/update/{id}', 'Backend\AboutController@update')->name('abouts.update');
        Route::get('/delete/{id}', 'Backend\AboutController@delete')->name('abouts.delete');
    });

    Route::prefix('categories')->group(function (){
        Route::get('/view', 'Backend\CategoryController@view')->name('categories.view');
        Route::get('/add', 'Backend\CategoryController@add')->name('categories.add');
        Route::post('/store', 'Backend\CategoryController@store')->name('categories.store');
        Route::get('/edit/{id}', 'Backend\CategoryController@edit')->name('categories.edit');
        Route::post('/update/{id}', 'Backend\CategoryController@update')->name('categories.update');
        Route::get('/delete/{id}', 'Backend\CategoryController@delete')->name('categories.delete');
    });

    Route::prefix('brands')->group(function (){
        Route::get('/view', 'Backend\BrandController@view')->name('brands.view');
        Route::get('/add', 'Backend\BrandController@add')->name('brands.add');
        Route::post('/store', 'Backend\BrandController@store')->name('brands.store');
        Route::get('/edit/{id}', 'Backend\BrandController@edit')->name('brands.edit');
        Route::post('/update/{id}', 'Backend\BrandController@update')->name('brands.update');
        Route::get('/delete/{id}', 'Backend\BrandController@delete')->name('brands.delete');
    });

    Route::prefix('colors')->group(function (){
        Route::get('/view', 'Backend\ColorController@view')->name('colors.view');
        Route::get('/add', 'Backend\ColorController@add')->name('colors.add');
        Route::post('/store', 'Backend\ColorController@store')->name('colors.store');
        Route::get('/edit/{id}', 'Backend\ColorController@edit')->name('colors.edit');
        Route::post('/update/{id}', 'Backend\ColorController@update')->name('colors.update');
        Route::get('/delete/{id}', 'Backend\ColorController@delete')->name('colors.delete');
    });

    Route::prefix('sizes')->group(function (){
        Route::get('/view', 'Backend\ProductSizeController@view')->name('sizes.view');
        Route::get('/add', 'Backend\ProductSizeController@add')->name('sizes.add');
        Route::post('/store', 'Backend\ProductSizeController@store')->name('sizes.store');
        Route::get('/edit/{id}', 'Backend\ProductSizeController@edit')->name('sizes.edit');
        Route::post('/update/{id}', 'Backend\ProductSizeController@update')->name('sizes.update');
        Route::get('/delete/{id}', 'Backend\ProductSizeController@delete')->name('sizes.delete');
    });

    Route::prefix('products')->group(function (){
        Route::get('/view', 'Backend\ProductController@view')->name('products.view');
        Route::get('/add', 'Backend\ProductController@add')->name('products.add');
        Route::post('/store', 'Backend\ProductController@store')->name('products.store');
        Route::get('/edit/{id}', 'Backend\ProductController@edit')->name('products.edit');
        Route::post('/update/{id}', 'Backend\ProductController@update')->name('products.update');
        Route::get('/delete/{id}', 'Backend\ProductController@delete')->name('products.delete');
        Route::get('/details/{id}', 'Backend\ProductController@details')->name('products.details');
    });

    Route::prefix('orders')->group(function (){
        Route::get('/pending/list', 'Backend\OrderController@pending')->name('orders.pending.list');
        Route::get('/approved/list', 'Backend\OrderController@approved')->name('orders.approved.list');
        Route::get('/approved/details/list/{id}', 'Backend\OrderController@details')->name('orders.approved.details.list');
        Route::get('/approved/{id}', 'Backend\OrderController@approveproduct')->name('orders.approved.product');
        Route::get('/unapproved/{id}', 'Backend\OrderController@unapproveproduct')->name('orders.unapproved.product');
    });

    Route::prefix('customers')->group(function (){
        Route::get('/view', 'Backend\CustomerController@view')->name('customers.view');
        Route::get('/draft/view', 'Backend\CustomerController@draftview')->name('customers.draft.view');
        Route::get('/delete/{id}', 'Backend\CustomerController@delete')->name('customers.delete');

    });

});

