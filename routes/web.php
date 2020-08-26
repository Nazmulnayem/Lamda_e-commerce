<?php

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

    Route::get('/', 'WelcomeController@index')->name('welcome');

    Route::get('/checkout', 'CheckoutController@index')->name('Checkout');
    Route::get('/Customer-login', 'userController@login')->name('Customer-login');
    Route::get('/Customer-register', 'userController@register')->name('Customer-register');
    Route::post('/customer-sign-up', 'CheckoutController@CustomerSignUp')->name('customer-sign-up');
    Route::get('/customer-shipping', 'CheckoutController@customershipping')->name('customer-shipping');
    Route::post('/save-shipping', 'CheckoutController@saveshipping')->name('save-shipping');
    Route::get('/payment', 'CheckoutController@payment')->name('payment');

    Route::get('/category-product/{id}', 'WelcomeController@categoryProduct')->name('category-product');
    Route::get('/product-details/{id}', 'WelcomeController@productDetials')->name('product-details');
    Route::get('/sub-category-product/{category_id}/{id}', 'WelcomeController@subcategoryProduct')->name('sub-category-product');
    Route::get('/add-to-cart', 'cartController@addToCart')->name('add-to-cart');
    Route::get('/show-cart', 'cartController@showToCart')->name('show-cart');
    Route::get('/delete-cart-item/{rowId}', 'cartController@deleteCart')->name('delete-cart-item');
    Route::post('/update-cart', 'cartController@updateCart')->name('update-cart');
    Route::get('/add-to-cart-home/{id}/{qty}', 'cartController@addToCarthome')->name('add-to-cart-home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 Category controller
 */
Route::get('/add-category', 'categoryController@index')->name('add-category');
Route::post('/new-category', 'categoryController@saveCategory')->name('new-category');
Route::get('/manage-category', 'categoryController@manageCategory')->name('manage-category');
Route::get('/unpublished-category/{id}', 'categoryController@unpublishedCategory')->name('unpublished-category');
Route::get('/published-category/{id}', 'categoryController@publishedCategory')->name('published-category');
Route::get('/category-edit/{id}', 'categoryController@editCategory')->name('edit-category');
Route::post('/category-update', 'categoryController@updateCategory')->name('update-category');
Route::get('/category-delete/{id}', 'categoryController@deleteCategory')->name('delete-category');
/*
subCategory controller
*/
Route::get('/add-sub-category', 'SubCategoryController@index')->name('add-sub-category');
Route::post('/save-sub-category', 'SubCategoryController@saveSubCategory')->name('save-sub-category');
Route::get('/manage-sub-category', 'SubCategoryController@subCategorymanage')->name('manage-sub-category');
Route::get('/unpublished-sub-category/{id}', 'SubCategoryController@unpublishedsubCategory')->name('unpublished-sub-category');
Route::get('/published-sub-category/{id}', 'SubCategoryController@publishedsubCategory')->name('published-sub-category');
Route::get('/category-sub-edit/{id}', 'SubCategoryController@editsubCategory')->name('edit-sub-category');
Route::post('/category-sub-update', 'SubCategoryController@updatesubCategory')->name('update-sub-category');
Route::get('/category-sub-delete/{id}', 'SubCategoryController@deletesubCategory')->name('delete-sub-category');
/*
 Brand controller
 */
Route::get('/add-brand', 'BrandController@index')->name('add-brand');
Route::post('/save-brand', 'BrandController@saveBrand')->name('save-brand');
Route::get('/manage-brand', 'BrandController@manageBrand')->name('manage-brand');;
Route::get('/unpublished-brand/{id}', 'BrandController@unpublishedBrand')->name('unpublished-brand');
Route::get('/published-brand/{id}', 'BrandController@publishedBrand')->name('published-brand');
Route::get('/brand-edit/{id}', 'BrandController@editBrand')->name('edit-brand');
Route::post('/brand-update', 'BrandController@updateBrand')->name('update-brand');
Route::get('/brand-delete/{id}', 'BrandController@deleteBrand')->name('delete-brand');

/*
 Product controllers
 */
Route::get('/add-product', 'ProductController@index')->name('add-product');
Route::post('/save-product', 'ProductController@saveProduct')->name('save-product');
Route::get('/manage-product', 'ProductController@manageProduct')->name('manage-product');
Route::get('/product-edit/{id}', 'ProductController@editProduct')->name('product-edit');
Route::post('/update-product', 'ProductController@updateProduct')->name('update-product');
Route::get('/product-delete/{id}', 'ProductController@deleteProduct')->name('product-delete');
Route::get('/product-unpublished/{id}', 'ProductController@unpublishedProduct')->name('product-unpublished');
Route::get('/product-published/{id}', 'ProductController@publishedProduct')->name('product-published');
Route::get('/product-details-info/{id}', 'ProductController@detailsProduct')->name('product-details-info');


/*
 Slidebar
 */
Route::get('/add-slidebar', 'slideImageController@index')->name('add-slidebar');
Route::post('/save-slidebar', 'slideImageController@saveImage')->name('save-slidebar');


















/*
 user
 */
Route::get('/User-manage','userController@manageUser')->name('User-manage');
Route::get('/User-delete/{id}','userController@deleteUser')->name('delete-user');
