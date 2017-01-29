<?php

namespace App\Http\Controllers;

use App\User;
use App\Classes\Helper;
use App\Http\Controllers\Controller;

class ReferenceController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function times_today()
	{
		$url = Helper::site_domain() . '/times/today.json?zone=sgr01&format=12-hour';
		$demo = file_get_contents($url);

		$params = array(
			'url' => $url,
			'demo' => Helper::json_formatter($demo)
			);

		return view('reference.times_today', $params);
	}

	public function times_tomorrow()
	{
		$url = Helper::site_domain() . '/times/tomorrow.json?zone=sgr01&format=12-hour';
		$demo = file_get_contents($url);

		$params = array(
			'url' => $url,
			'demo' => Helper::json_formatter($demo)
			);

		return view('reference.times_tomorrow', $params);
	}

	public function times_this_week()
	{
		$url = Helper::site_domain() . '/times/this_week.json?zone=sgr01&format=12-hour';
		$demo = file_get_contents($url);

		$params = array(
			'url' => $url,
			'demo' => Helper::json_formatter($demo)
			);

		return view('reference.times_this_week', $params);
	}

	public function times_this_month()
	{
		$url = Helper::site_domain() . '/times/this_month.json?zone=sgr01&format=12-hour';
		$demo = file_get_contents($url);

		$params = array(
			'url' => $url,
			'demo' => Helper::json_formatter($demo)
			);

		return view('reference.times_this_month', $params);
	}


	public function times_date()
	{
		$start = date('d-m-Y', strtotime('today'));
		$end = date('d-m-Y', strtotime('+2 days'));

		$url = Helper::site_domain() . '/times/date.json?zone=sgr01&start='.$start.'&end='.$end.'&format=12-hour';
		$demo = file_get_contents($url);

		$params = array(
			'url' => $url,
			'demo' => Helper::json_formatter($demo)
			);

		return view('reference.times_date', $params);
	}


	public function times_month()
	{
		$month = date('m');
		$year = date('Y');

		$url = Helper::site_domain() . '/times/month.json?zone=sgr01&month='.$month.'&year='.$year.'&format=12-hour';
		$demo = file_get_contents($url);

		$params = array(
			'url' => $url,
			'demo' => Helper::json_formatter($demo)
			);

		return view('reference.times_month', $params);
	}

	// -- zones
	public function zone_states()
	{
		$url = Helper::site_domain() . '/zone/states.json';
		$demo = file_get_contents($url);

		$params = array(
			'url' => $url,
			'demo' => Helper::json_formatter($demo)
			);

		return view('reference.zone_states', $params);
	}

	public function zone_zones()
	{
		$url = Helper::site_domain() . '/zone/zones.json?state=selangor&zone=sgr01';
		$demo = file_get_contents($url);

		$params = array(
			'url' => $url,
			'demo' => Helper::json_formatter($demo)
			);

		return view('reference.zone_zones', $params);
	}

	public function zone_grouped()
	{
		$url = Helper::site_domain() . '/zone/grouped.json?state=selangor&zone=sgr01';
		$demo = file_get_contents($url);

		$params = array(
			'url' => $url,
			'demo' => Helper::json_formatter($demo)
			);

		return view('reference.zone_grouped', $params);
	}

}
