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

Route::get('/', function () {
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@index')->name('home');
Route::get('/admin/categories', 'CategoriesController@index')->name('list_categories');
Route::get('/admin/categories/create', 'CategoriesController@create')->name('list_categories');
Route::get('/admin/categories/edit/{id}', 'CategoriesController@edit')->name('edit_categories');
Route::delete('/admin/categories/destroy/{id}', 'CategoriesController@destroy')->name('destroy_categories');
Route::match(['put', 'patch'],'/admin/categories/update','CategoriesController@update')->name('update_categories');
Route::resource('categories', 'CategoriesController');
Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');
Route::get('/downloadPDF/{id}','CategoriesController@downloadPDF');
// student routes
Route::get('/admin/student', 'StudentRegController@index')->name('list_student');
Route::get('/admin/student/create', 'StudentRegController@create')->name('create_students');
Route::delete('/admin/student/destroy/{id}', 'StudentRegController@destroy')->name('destroy_students');
Route::get('/admin/student/edit/{id}', 'StudentRegController@edit')->name('edit_students');
Route::match(['put', 'patch'],'/admin/student/update','StudentRegController@update')->name('update_students');
Route::post('/admin/student/store', 'StudentRegController@store')->name('store_students');
Route::resource('students', 'StudentRegController');
//fee collection
Route::get('/admin/Fees','FeeCollectionController@index')->name('list_Fees');
Route::resource('Fees', 'FeeCollectionController');
Route::get('/downloadfeePDF/{id}','FeeCollectionController@downloadPDF')->name('fee_pdf');
// Class classification
Route::resource('Class','ClassDefinitionController');
Route::get('/admin/Class','ClassDefinitionController@index')->name('list_Class');
//indiscipeline
Route::resource('Indiscipline','IndisciplineController');
Route::get('/admin/Indiscipline','IndisciplineController@index')->name('list_Indiscipline');

Route::get('/logout', function()
{
	Auth::logout();
	return Redirect::to('/login');
});