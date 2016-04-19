<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('lang/{lang}', function ($lang) {
    session(['lang' => $lang]);
    return \Redirect::back();
})->where([
    'lang' => 'en|es'
]);

Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'Shop\HomeController@index');
    Route::get('search', 'Shop\HomeController@search');
    Route::get('mark/{mark}', 'Shop\HomeController@showProductsMark');
    Route::get('category/{id}', 'Shop\HomeController@showProductsCat');
    Route::get('product/details/{id}', 'Shop\HomeController@productDetails');
    Route::get('about', 'Shop\HomeController@about');
    Route::get('services', 'Shop\HomeController@services');
    Route::get('contact', 'Shop\HomeController@contact');
    Route::post('product/opinion/add/{id}', 'Shop\HomeController@addOpinion');
    Route::post('contact_submit', 'Shop\HomeController@store_message');
});




// Admin Routes...  comprobar si se puede hacer con grupos de rutas
Route::get('admin/login', 'Auth\AuthController@getLogin');

Route::get('mateu/admin', function(){
    return redirect('admin/login');
});

Route::get('admin/back', function(){
      return Redirect::back();
});




Route::post('admin/dologin', 'Auth\AuthController@postLogin');

Route::get('admin/users', 'Admin\AdminController@getUsers');
Route::get('admin/user/delete/{id}', 'Admin\AdminController@getDeleteUser');
Route::get('admin/user/register', 'Admin\AdminController@getRegisterUser');
Route::post('admin/user/store', 'Admin\AdminController@postRegisterUser');
Route::get('admin/user/edit/{id}', 'Admin\AdminController@getEditUser');
Route::post('admin/user/update/{id}', 'Admin\AdminController@postEditUser');

Route::get('admin/logout', 'Admin\AdminController@getLogout');


Route::get('admin/dashboard', 'Admin\AdminController@index');

Route::get('admin/categories', 'Admin\CategoryController@index');
Route::get('admin/category/create', 'Admin\CategoryController@getCreate');
Route::post('admin/category/store', 'Admin\CategoryController@postCreate');
Route::get('admin/category/delete/{id}', 'Admin\CategoryController@getDelete');

Route::get('admin/category/edit/{id}', 'Admin\CategoryController@getEdit');
Route::post('admin/category/update/{id}', 'Admin\CategoryController@postEdit');

Route::get('admin/products/category/{id}', 'Admin\CategoryController@getCategoryProducts');
Route::get('admin/products/category/{id}/search', 'Admin\CategoryController@categoryProductsSearch');

Route::get('admin/products', 'Admin\ProductController@index');
Route::get('admin/product/create', 'Admin\ProductController@getCreate');
Route::post('admin/product/store', 'Admin\ProductController@postCreate');
Route::get('admin/product/delete/{id}', 'Admin\ProductController@getDelete');
Route::get('admin/product/search', 'Admin\ProductController@search');


Route::get('admin/product/edit/{id}', 'Admin\ProductController@getEdit');
Route::post('admin/product/update/{id}', 'Admin\ProductController@postEdit');

Route::get('admin/brands', 'Admin\BrandController@index');
Route::get('admin/brand/create', 'Admin\BrandController@getCreate');
Route::post('admin/brand/store', 'Admin\BrandController@postCreate');
Route::get('admin/brand/delete/{id}', 'Admin\BrandController@getDelete');
Route::get('admin/brand/edit/{id}', 'Admin\BrandController@getEdit');
Route::post('admin/brand/update/{id}', 'Admin\BrandController@postEdit');

Route::get('admin/contacts', 'Admin\AdminController@contacts');
Route::get('admin/contact/delete/{id}', 'Admin\AdminController@deleteContact');


// end Admin routes....


/*Locate Route*/
/*use Illuminate\Support\Facades\App;

Route::get( '/{locale}' , function ($locale) {
     App::setLocale('es');
    return redirect('/');
});*/


