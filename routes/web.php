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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/sitemap.xml', 'HomeController@sitemap')->name('sitemap');
Route::get('/{slug_category}', 'HomeController@category')->name('category');
Route::post('/user/comment', 'HomeController@comment')->name('comment');

Route::get('/panel/admin/login', 'AdminController@girisform')->name('adminlogin');
Route::post('/panel/admin/login', 'AdminController@giris')->name('adminlogin');
Route::get('/panel/admin/logout', 'AdminController@adminout')->name('adminout');
Route::get('/panel/admin/changepassword', 'AdminController@adminchange')->name('adminpasswordchange');
Route::post('/panel/admin/changepassword', 'AdminController@changepassword')->name('adminpasswordchange');


Route::get('/panel/admin/home', 'AdminController@index')->name('adminindex');

Route::get('/panel/admin/home/category', 'AdminController@category')->name('admincategory');
Route::post('/panel/admin/home/category', 'AdminController@addcategory')->name('adminaddcategory');
Route::get('/panel/admin/home/category/delete/{id}', 'AdminController@deletecategory')->name('admindeletecategory');

Route::get('/panel/admin/home/accounts', 'AdminController@account')->name('adminaccount');
Route::post('/panel/admin/home/accounts', 'AdminController@addaccount')->name('adminaddaccount');
Route::get('/panel/admin/home/accounts/delete/{id}', 'AdminController@deleteaccount')->name('admindeleteaccount');

Route::get('/panel/admin/home/comments', 'AdminController@comment')->name('admincomment');
Route::post('/panel/admin/home/comments', 'AdminController@addcomment')->name('adminaddcomment');
Route::get('/panel/admin/home/comments/delete/{id}', 'AdminController@deletecomment')->name('admindeletecomment');

Route::get('/panel/admin/home/tags', 'AdminController@tag')->name('admintag');
Route::post('/panel/admin/home/tags', 'AdminController@addtag')->name('adminaddtag');
Route::get('/panel/admin/home/tags/delete/{id}', 'AdminController@deletetag')->name('admindeletetag');

Route::get('/tags/{slug_tag}', 'HomeController@tagmanager')->name('tagmanager');



