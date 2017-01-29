<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kawasan;
use App\WaktuSolat;

class HomeController extends Controller {

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

	public function getIndex()
	{
		return redirect(route('ref.times.today'));
	}

	public function getDisclaimer()
	{
		$geoip = geoip()->getLocation();
		debug($geoip);

		$last_update = WaktuSolat::orderBy('created_at', 'desc')->first();
		$params = array(
			'last_update' => $last_update->created_at->format('d-m-Y H:ia')
		);
		return view('home.disclaimer', $params);
	}

	public function getZones()
	{
		$states = array(
				'Johor',
				'Kedah',
				'Kelantan',
				'Melaka',
				'Negeri Sembilan',
				'Pahang',
				'Perak',
				'Perlis',
				'Pulau Pinang',
				'Sabah',
				'Sarawak',
				'Selangor',
				'Terengganu',
				'Putrajaya',
				'Kuala Lumpur',
				'Labuan'
			);
		$results = array();
		foreach ($states as $state) {
			$results[$state] = Kawasan::where('negeri', $state)->get();
		}

		$params = array(
			'states' => $states,
			'results' => $results
			);
		return view('home.zones', $params);
	}

	public function getStatus()
	{
		$months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

		$states = array(
				'Johor',
				'Kedah',
				'Kelantan',
				'Melaka',
				'Negeri Sembilan',
				'Pahang',
				'Perak',
				'Perlis',
				'Pulau Pinang',
				'Sabah',
				'Sarawak',
				'Selangor',
				'Terengganu',
				'Putrajaya',
				'Kuala Lumpur',
				'Labuan'
			);
		$results = array();
		$status = array();
		foreach ($states as $state) {
			$codes = Kawasan::distinct()->select('zone')->where('negeri', $state)->groupBy('zone')->get();
			$results[$state] = $codes;
			foreach ($codes as $key => $code) {
				$status[$code['zone']] = $this->dataAvailibility($code['zone']);
			}
		}

		$last_update = WaktuSolat::orderBy('created_at', 'desc')->first();

		$params = array(
			'months' => $months,
			'states' => $states,
			'results' => $results,
			'status' => $status,
			'last_update' => $last_update->created_at->format('d-m-Y H:ia')
			);

		return view('home.status', $params);
	}

	private function dataAvailibility($zone)
	{
		$final = array();
		for ($month=1; $month<=12; $month++) {
			$tmptime = mktime(0, 0, 0, $month, 1, date('Y'));
			$totaldays = date('t', $tmptime);

			$count = WaktuSolat::select('id')
						->where('month', $month)
						->where('zone', $zone)
						->count();
			// debug($zone, $count, $totaldays);
			if ($count == $totaldays) {
				$status = true;
			} else {
				$status = false;
			}
			$final[$month] = $status;
		}
		return $final;
	}

}
