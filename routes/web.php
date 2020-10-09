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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>'auth'], function (){
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

});

