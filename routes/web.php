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

// Route::get('/', function () {
//     return redirect('/index');
// });

Route::get('/', 'QovexController@logout');
// Route::get('/Web-login', 'Website\MainController@login');
// Route::get('/Web-register', 'Website\MainController@register');
// Route::post('/Register-submit', 'Website\MainController@register_submit');
// Route::post('/Login-submit', 'Website\MainController@login_submit');

/*   Student login Registration      */
// Route::get('/Student-login', 'Student\StudentController@index');
Route::get('/Student-register', 'Student\StudentController@register');

Route::middleware(['auth','User'])->group(function() {
    Route::get('/', 'Student\StudentController@index');
});

Auth::routes();
Route::get('logout', 'QovexController@logout');

Route::get('pages-login', 'QovexController@index');
Route::get('pages-login-2', 'QovexController@index');
Route::get('pages-register', 'QovexController@index');
Route::get('pages-register-2', 'QovexController@index');
Route::get('pages-recoverpw', 'QovexController@index');
Route::get('pages-recoverpw-2', 'QovexController@index');
Route::get('pages-lock-screen', 'QovexController@index');
Route::get('pages-lock-screen-2', 'QovexController@index');
Route::get('pages-404', 'QovexController@index');
Route::get('pages-500', 'QovexController@index');
Route::get('pages-maintenance', 'QovexController@index');
Route::get('pages-comingsoon', 'QovexController@index');
Route::post('login-status', 'QovexController@checkStatus');
// Route::get('admin-list', 'AdminController@admin_list');
// Route::get('user-list', 'AdminController@user_list');
Route::get('categories-list', 'AdminController@categories_list');
Route::get('edit-categories/{id}', 'AdminController@editcategories');
Route::get('add-categories', 'AdminController@addcategories');
Route::post('categories-submit', 'AdminController@categoriesSubmit');
// Route::get('{any}', 'QovexController@index');




// You can also use auth middleware to prevent unauthenticated users
Route::group(['middleware' => 'auth'], function () {
    // Route::get('/home', 'HomeController@index')->name('home');
    
});

Route::middleware(['auth', 'Admin'])->group(function () {
    Route::get('admin-list', 'AdminController@admin_list');
    Route::get('user-list', 'AdminController@user_list');
    Route::get('/home', 'HomeController@index')->name('home'); 
    
    Route::get('add-standard', 'AdminController@add_standard');
    Route::get('add-subject', 'AdminController@add_subject');
    Route::get('add-chapter', 'AdminController@add_chapter');

    Route::post('submit-standard', 'AdminController@submit_standard');
    Route::post('submit-subject', 'AdminController@submit_subject');
    
    
    Route::post('submit-chapter', 'AdminController@submit_chapter');
    
    Route::get('add-subject', 'AdminController@add_subject');
    Route::get('{any}', 'QovexController@index');
 
});


