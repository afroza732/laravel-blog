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

Route::get('/', 'WelcomeController@index');
Route::get('/contact', 'WelcomeController@contact');
Route::get('/post-details/{id}', 'WelcomeController@postDetails');
Route::get('/category-blog/{id}', 'WelcomeController@categoryBlog');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'SuperAdminController@index');
Route::post('/admin_login', 'AdminController@adminLogin');
Route::get('/logout', 'SuperAdminController@logout');

//category

Route::get('/add-category', 'SuperAdminController@addCategory');
Route::post('/save-category', 'SuperAdminController@saveCategory');
Route::get('/manage-category', 'SuperAdminController@manageCategory');
Route::get('/unpublished-category/{id}', 'SuperAdminController@unpublishCategory');
Route::get('/published-category/{id}', 'SuperAdminController@publishCategory');
Route::get('/delete-category/{id}', 'SuperAdminController@deleteCategory');
Route::get('/edit-category/{id}', 'SuperAdminController@editCategory');
Route::post('/update-category', 'SuperAdminController@updateCategory');


//blog
Route::get('/add-blog', 'SuperAdminController@addBlog');
Route::post('/save-post', 'SuperAdminController@savePost');
Route::get('/manage-blog', 'SuperAdminController@managePost');
Route::get('/unpublished-post/{id}', 'SuperAdminController@unpublishPost');
Route::get('/published-post/{id}', 'SuperAdminController@publishPost');
Route::get('/delete-post/{id}', 'SuperAdminController@deletePost');
Route::get('/edit-post/{id}', 'SuperAdminController@editPost');
Route::post('/update-post', 'SuperAdminController@updatePost');