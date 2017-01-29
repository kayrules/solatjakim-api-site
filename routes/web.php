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

Route::get('/', 							['as' => 'home', 					'uses' => 'HomeController@getIndex']);
Route::get('/disclaimer', 					['as' => 'home.disclaimer', 		'uses' => 'HomeController@getDisclaimer']);
Route::get('/status', 						['as' => 'home.status', 			'uses' => 'HomeController@getStatus']);
Route::get('/zones', 						['as' => 'home.zones', 				'uses' => 'HomeController@getZones']);

// Reference
Route::get('/reference/times/today', 		['as' => 'ref.times.today', 		'uses' => 'ReferenceController@times_today']);
Route::get('/reference/times/tomorrow', 	['as' => 'ref.times.tomorrow', 		'uses' => 'ReferenceController@times_tomorrow']);
Route::get('/reference/times/this_week', 	['as' => 'ref.times.this_week', 	'uses' => 'ReferenceController@times_this_week']);
Route::get('/reference/times/this_month',	['as' => 'ref.times.this_month', 	'uses' => 'ReferenceController@times_this_month']);
Route::get('/reference/times/date', 		['as' => 'ref.times.date', 			'uses' => 'ReferenceController@times_date']);
Route::get('/reference/times/month', 		['as' => 'ref.times.month', 		'uses' => 'ReferenceController@times_month']);

Route::get('/reference/zone/states', 		['as' => 'ref.zone.states', 		'uses' => 'ReferenceController@zone_states']);
Route::get('/reference/zone/zones', 		['as' => 'ref.zone.zones', 			'uses' => 'ReferenceController@zone_zones']);
Route::get('/reference/zone/grouped', 		['as' => 'ref.zone.grouped', 		'uses' => 'ReferenceController@zone_grouped']);
// Route::get('/reference/zone/coordinate', 	['as' => 'ref.zone.coordinate', 	'uses' => 'ReferenceController@zone_coordinate']);


// RESTful
Route::get('/times/today.json', 			['as' => 'api.times.today', 		'uses' => 'APIController@times_today']);
Route::get('/times/tomorrow.json', 			['as' => 'api.times.tomorrow', 		'uses' => 'APIController@times_tomorrow']);
Route::get('/times/this_week.json', 		['as' => 'api.times.this_week', 	'uses' => 'APIController@times_this_week']);
Route::get('/times/this_month.json', 		['as' => 'api.times.this_month', 	'uses' => 'APIController@times_this_month']);
Route::get('/times/date.json', 				['as' => 'api.times.date', 			'uses' => 'APIController@times_date']);
Route::get('/times/month.json', 			['as' => 'api.times.month', 		'uses' => 'APIController@times_month']);

Route::get('/zone/states.json', 			['as' => 'api.states', 				'uses' => 'APIController@states']);
Route::get('/zone/zones.json', 				['as' => 'api.zones', 				'uses' => 'APIController@zones']);
Route::get('/zone/grouped.json', 			['as' => 'api.grouped', 			'uses' => 'APIController@groupedZones']);
Route::get('/zone/coordinate.json', 		['as' => 'api.coordinate', 			'uses' => 'APIController@coordinate']);
