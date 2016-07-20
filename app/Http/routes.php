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

Route::get('/', function () {
    return view('welcome');
});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
// Route::get('Upload', 'HomeController@UploadOK');
// Route::auth();

Route::group(['middleware' => 'web'], function () {
	Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
	Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
	Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

	Route::get('/', 'HomeController@index');
	Route::get('/test', 'HomeController@test');


	/**
	 * Visitor Register Route
	 */
	Route::post('regvisitor', 'HomeController@savevisitor');
});

Route::group(['middleware' => ['web','auth']], function(){
	Route::get('Admin','AdminController@index');
	Route::get('Admin/TableVisitor','AdminController@TableVisitor');
	Route::get('Profile','AdminController@profile')->name('Profile');
	Route::put('ChangeProfile','AdminController@changeprofile');
	/**
	 * ADMIN Visitor Table
	 */
	
	Route::delete('/visitor/{id?}','AdminController@destroy');
	Route::get('/visitor/view/{id?}','AdminController@view');
	Route::put('/visitor/put/{id?}','AdminController@update');
	Route::get('/visitor/print/{id?}','AdminController@printtag');
});
