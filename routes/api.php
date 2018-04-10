<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v1'], function(){
//========== DATA MASTER ==========//
	// ===== ADMIN ===== //
	Route::get('/admin','AdminController@all');
	Route::get('/admin/{id}','AdminController@one');
	Route::post('/admin/register','AdminController@create');
	Route::post('/admin/update/{id}','AdminController@update');
	Route::delete('/admin/{id}','AdminController@delete');
	// ==== ADMIN LOGIN ==== //
	Route::post('/admin/login','AdminController@login');

	// ==== COMPANY ==== //
	Route::get('/company','CompanyController@all');
	Route::get('/company/{id}','CompanyController@one');
	Route::post('/company/register','CompanyController@create');
	Route::post('/company/update/{id}','CompanyController@update');
	Route::delete('/company/{id}','CompanyController@delete');

	// ==== DESTINATION ==== //
	Route::get('/destination','AdminController@all');
	Route::get('/destination/{id}','AdminController@one');
	Route::post('/destination/add','AdminController@create');
	Route::post('/destination/update/{id}','AdminController@update');
	Route::delete('/destination/{id}','AdminController@delete');

	// ==== ACTIVITY ==== //
	Route::get('/admin','AdminController@all');
	Route::get('/admin/{id}','AdminController@one');
	Route::post('/admin/register','AdminController@create');
	Route::post('/admin/update/{id}','AdminController@update');
	Route::delete('/admin/{id}','AdminController@delete');

//========== DATA RELATION ==========//
	// ==== PRODUCT ==== //
	Route::get('/admin','AdminController@all');
	Route::get('/admin/{id}','AdminController@one');
	Route::post('/admin/register','AdminController@create');
	Route::post('/admin/update/{id}','AdminController@update');
	Route::delete('/admin/{id}','AdminController@delete');

	// ==== FILE ==== //
	Route::get('/admin','AdminController@all');
	Route::get('/admin/{id}','AdminController@one');
	Route::post('/admin/register','AdminController@create');
	Route::post('/admin/update/{id}','AdminController@update');
	Route::delete('/admin/{id}','AdminController@delete');

	//	==== PRICE ==== //
	Route::get('/admin','AdminController@all');
	Route::get('/admin/{id}','AdminController@one');
	Route::post('/admin/register','AdminController@create');
	Route::post('/admin/update/{id}','AdminController@update');
	Route::delete('/admin/{id}','AdminController@delete');

	// ==== ITINERARY ==== //
	Route::get('/admin','AdminController@all');
	Route::get('/admin/{id}','AdminController@one');
	Route::post('/admin/register','AdminController@create');
	Route::post('/admin/update/{id}','AdminController@update');
	Route::delete('/admin/{id}','AdminController@delete');

	// ==== SCHEDULE ==== //
	Route::get('/admin','AdminController@all');
	Route::get('/admin/{id}','AdminController@one');
	Route::post('/admin/register','AdminController@create');
	Route::post('/admin/update/{id}','AdminController@update');
	Route::delete('/admin/{id}','AdminController@delete');

	

	// Route::resource('meeting','MeetingController',[
	// 	'except'=> ['create','edit']
	// ]);

	// Route::resource('meeting/registration','RegisterController',[
	// 	'only'=> ['store','destroy']
	// ]);

	// Route::post('user/register',[
	// 	'uses' => 'AuthController@store'
	// ]);

	// Route::post('user/signin',[
	// 	'uses' => 'AuthController@signin'
	// ]);	
});

