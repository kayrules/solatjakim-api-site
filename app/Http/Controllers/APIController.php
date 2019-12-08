<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kawasan;
use App\WaktuSolat;
use App\Classes\Helper;
use Illuminate\Support\Facades\DB;

/**
* RESTful class that return JSON String
*/
class APIController extends Controller
{

	public function times_today(Request $request)
	{
		$z = $request->zone;
		$f = $request->format;
		$pre = $request->pre;

		$d = date('j');
		$m = date('n');
		$y = date('Y');

		$locations = Kawasan::where('zone', '=', $z)->get();

		if (!$request->zone) {
			return $this->_error('REQUIRED_FIELD', 'Missing Required field, zone.');
		} else if (count($locations) == 0) {
			return $this->_error('INVALID_ZONE', 'Invalid zone code given.');
		}

		try {

			$locats = array();
			foreach ($locations as $key => $location) {
				$locats[] = $location->lokasi;
			}

			$times = $this->_get_times($z, $f, $d, $m, $y);

			$start_date = date('d-m-Y', mktime(0,0,0,$m,$d,$y));
			$end_date = date('d-m-Y', mktime(0,0,0,$m,$d,$y));

			$final = array(
				'zone' => strtoupper($z),
				'start' => $start_date,
				'end' => $end_date,
				'locations' => $locats,
				'prayer_times' => $times
				);

			if ($pre == 'true' || $pre == 'TRUE') {
				return '<pre>' . Helper::json_formatter(json_encode($final)) . '</pre>';
			} else {
				return response()->json($final);
			}

		} catch(Exception $e) {
			return $this->_error('COMPLEX_ERROR', 'Complex error has occured.');
		}
	}


	public function times_tomorrow(Request $request)
	{
		$z = $request->zone;
		$f = $request->format;
		$pre = $request->pre;

		$tomorrow = strtotime('tomorrow');
		$d = date('j', $tomorrow);
		$m = date('n', $tomorrow);
		$y = date('Y', $tomorrow);

		$locations = Kawasan::where('zone', '=', $z)->get();

		if (empty($request->zone)) {
			return $this->_error('REQUIRED_FIELD', 'Missing Required field, zone.');
		} else if (count($locations) == 0) {
			return $this->_error('INVALID_ZONE', 'Invalid zone code given.');
		}

		try {

			$locats = array();
			foreach ($locations as $key => $location) {
				$locats[] = $location->lokasi;
			}

			$times = $this->_get_times($z, $f, $d, $m, $y);

			$start_date = date('d-m-Y', mktime(0,0,0,$m,$d,$y));
			$end_date = date('d-m-Y', mktime(0,0,0,$m,$d,$y));

			$final = array(
				'zone' => strtoupper($z),
				'start' => $start_date,
				'end' => $end_date,
				'locations' => $locats,
				'prayer_times' => $times
				);

			if ($pre == 'true' || $pre == 'TRUE') {
				return '<pre>' . Helper::json_formatter(json_encode($final)) . '</pre>';
			} else {
				return response()->json($final);
			}

		} catch(Exception $e) {
			return $this->_error('COMPLEX_ERROR', 'Complex error has occured.');
		}
	}

	public function times_date(Request $request)
	{
		$z = $request->zone;
		$s = $request->start;
		$e = $request->end;
		$f = $request->format;
		$pre = $request->pre;

		$locations = Kawasan::where('zone', '=', $z)->get();
		$hour = 24*60*60;
		$ex_start = explode('-', $s);
		$start = mktime(0, 0, 0, $ex_start[1], $ex_start[0], $ex_start[2]);
		if ($request->has('end')) {
			$ex_end = explode('-', $e);
			$end = mktime(0, 0, 0, $ex_end[1], $ex_end[0], $ex_end[2]);
		} else {
			$ex_end = $ex_start;
			$end = $start;
		}

		$maxlimit = 730;
		$total_days = ($end - $start) / $hour;

		if (!$request->has('zone')) {
			return $this->_error('REQUIRED_FIELD', 'Missing Required field, zone.');
		} else if (!$request->has('start')) {
			return $this->_error('REQUIRED_FIELD', 'Missing Required field, start.');
		} else if (count($locations) == 0) {
			return $this->_error('INVALID_ZONE', 'Invalid zone code given.');
		} else if($total_days > $maxlimit) {
			return $this->_error('LIMIT_EXCEEDED', 'Maximum limit of '.$maxlimit.' queries exceeded. You are trying to run ' . $total_days . ' queries.');
		}

		try {
			$locats = array();
			foreach ($locations as $key => $location) {
				$locats[] = $location->lokasi;
			}

			$range_times = array();
			for ($i=$start; $i<=$end; $i+=$hour) {
				// $date = mktime(0, 0, 0, date('m'), date('d')+$i, date('Y'));
				$date = $i;
				$d = date('j', $date);
				$m = date('n', $date);
				$y = date('Y', $date);

				$times = $this->_get_times($z, $f, $d, $m, $y);
				$range_times[] = $times;
			}

			$start_date = date('d-m-Y', $start);
			$end_date = date('d-m-Y', $end);

			$final = array(
				'zone' => strtoupper($z),
				'start' => $start_date,
				'end' => $end_date,
				'locations' => $locats,
				'prayer_times' => $range_times
				);

			if ($pre == 'true' || $pre == 'TRUE') {
				return '<pre>' . Helper::json_formatter(json_encode($final)) . '</pre>';
			} else {
				return response()->json($final);
			}

		} catch(Exception $e) {
			return $this->_error('COMPLEX_ERROR', 'Complex error has occured.');
		}
	}


	public function times_month(Request $request)
	{
		$z = $request->zone;
		$month = (int) $request->month;
		$year = (int) $request->year;
		$f = $request->format;
		$pre = $request->pre;

		$locations = Kawasan::where('zone', '=', $z)->get();

		if (!$request->has('zone')) {
			return $this->_error('REQUIRED_FIELD', 'Missing Required field, zone.');
		} else if (!$request->has('month')) {
			return $this->_error('REQUIRED_FIELD', 'Missing Required field, month.');
		} else if (!$request->has('year')) {
			return $this->_error('REQUIRED_FIELD', 'Missing Required field, year.');
		} else if (count($locations) == 0) {
			return $this->_error('INVALID_ZONE', 'Invalid zone code given.');
		}

		try {
			$hour = 24*60*60;
			$start = mktime(0, 0, 0, $month, 1, $year);
			$end = mktime(0, 0, 0, $month, date('t', $start), $year);

			$locats = array();
			foreach ($locations as $key => $location) {
				$locats[] = $location->lokasi;
			}

			$range_times = array();
			for ($i=$start; $i<=$end; $i+=$hour) {
				// $date = mktime(0, 0, 0, date('m'), date('d')+$i, date('Y'));
				$date = $i;
				$d = date('j', $date);
				$m = date('n', $date);
				$y = date('Y', $date);

				$times = $this->_get_times($z, $f, $d, $m, $y);
				$range_times[] = $times;
			}

			$start_date = date('d-m-Y', $start);
			$end_date = date('d-m-Y', $end);

			$final = array(
				'zone' => strtoupper($z),
				'start' => $start_date,
				'end' => $end_date,
				'locations' => $locats,
				'prayer_times' => $range_times
				);

			if ($pre == 'true' || $pre == 'TRUE') {
				return '<pre>' . Helper::json_formatter(json_encode($final)) . '</pre>';
			} else {
				return response()->json($final);
			}

		} catch(Exception $e) {
			return $this->_error('COMPLEX_ERROR', 'Complex error has occured.');
		}
	}

	public function times_this_week(Request $request)
	{
		$z = $request->zone;
		$f = $request->format;
		$pre = $request->pre;
		$dow = $request->dow;

		$locations = Kawasan::where('zone', '=', $z)->get();

		if (!$request->has('zone')) {
			return $this->_error('REQUIRED_FIELD', 'Missing Required field, zone.');
		} else if (count($locations) == 0) {
			return $this->_error('INVALID_ZONE', 'Invalid zone code given.');
		}

		try {
			$locats = array();
			foreach ($locations as $key => $location) {
				$locats[] = $location->lokasi;
			}

			$hour = 24*60*60;
			$thisWeek = $this->_range_week('today', $dow);

			$weekly_times = array();
			for ($i=$thisWeek['start']; $i<=$thisWeek['end']; $i+=$hour) {
				// $date = mktime(0, 0, 0, date('m'), date('d')+$i, date('Y'));
				$date = $i;
				$d = date('j', $date);
				$m = date('n', $date);
				$y = date('Y', $date);

				$times = $this->_get_times($z, $f, $d, $m, $y);
				$weekly_times[] = $times;
			}

			$start_date = date('d-m-Y', $thisWeek['start']);
			$end_date = date('d-m-Y', $thisWeek['end']);

			$final = array(
				'zone' => strtoupper($z),
				'start' => $start_date,
				'end' => $end_date,
				'locations' => $locats,
				'prayer_times' => $weekly_times
				);

			if ($pre == 'true' || $pre == 'TRUE') {
				return '<pre>' . Helper::json_formatter(json_encode($final)) . '</pre>';
			} else {
				return response()->json($final);
			}

		} catch(Exception $e) {
			return $this->_error('COMPLEX_ERROR', 'Complex error has occured.');
		}
	}

	public function times_this_month(Request $request)
	{
		$z = $request->zone;
		$f = $request->format;
		$pre = $request->pre;

		$locations = Kawasan::where('zone', '=', $z)->get();

		if (!$request->has('zone')) {
			return $this->_error('REQUIRED_FIELD', 'Missing Required field, zone.');
		} else if (count($locations) == 0) {
			return $this->_error('INVALID_ZONE', 'Invalid zone code given.');
		}

		try {
			$locats = array();
			foreach ($locations as $key => $location) {
				$locats[] = $location->lokasi;
			}

			$hour = 24*60*60;
			$thisMonth = $this->_range_month('today');

			$monthly_times = array();
			for ($i=$thisMonth['start']; $i<=$thisMonth['end']; $i+=$hour) {
				// $date = mktime(0, 0, 0, date('m'), date('d')+$i, date('Y'));
				$date = $i;
				$d = date('j', $date);
				$m = date('n', $date);
				$y = date('Y', $date);

				$times = $this->_get_times($z, $f, $d, $m, $y);
				$monthly_times[] = $times;
			}

			$start_date = date('d-m-Y', $thisMonth['start']);
			$end_date = date('d-m-Y', $thisMonth['end']);

			$final = array(
				'zone' => strtoupper($z),
				'start' => $start_date,
				'end' => $end_date,
				'locations' => $locats,
				'prayer_times' => $monthly_times
				);

			if ($pre == 'true' || $pre == 'TRUE') {
				return '<pre>' . Helper::json_formatter(json_encode($final)) . '</pre>';
			} else {
				return response()->json($final);
			}

		} catch(Exception $e) {
			return $this->_error('COMPLEX_ERROR', 'Complex error has occured.');
		}
	}


	public function zones(Request $request)
	{
		$z = $request->zone;
		$pre = $request->pre;
		$gets = array('zone', 'negeri', 'lokasi', 'lat', 'lng');

		$results = array();
		if ($request->has('state')) {
			$state = ucwords($request->state);
			$states = array($state);
		} else {
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
		}

		foreach ($states as $state) {
			if($request->has('zone')) {
				$zone = strtoupper($z);
				$results = Kawasan::where('negeri', $state)->where('zone', $zone)->get($gets);
			} else {
				$res = Kawasan::where('negeri', $state)->get($gets);
				foreach($res as $r) {
					$results[] = $r;
				}
			}
		}

		$final = array(
			'states' => $states,
			'results' => $results
			);

		if ($pre == 'true' || $pre == 'TRUE') {
			return '<pre>' . Helper::json_formatter(json_encode($final)) . '</pre>';
		} else {
			return response()->json($final);
		}
	}

	public function groupedZones(Request $request)
	{
		$z = $request->zone;
		$pre = $request->pre;
		$gets = array('zone', 'negeri', 'lokasi', 'lat', 'lng');

		$results = array();
		if ($request->has('state')) {
			$state = ucwords($request->state);
			$states = array($state);
		} else {
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
		}

		$zone_codes = array();
		$locations = array();
		foreach ($states as $state) {
			if($request->has('zone')) {
				$zone = strtoupper($z);
				$kawasans = Kawasan::where('negeri', $state)->where('zone', $zone)->get($gets);
			} else {
				$kawasans = Kawasan::where('negeri', $state)->get($gets);
			}

			foreach ($kawasans as $st) {
				if(!in_array($st->zone, $zone_codes)) {
					$zone_codes[] = $st->zone;
				}
				$locations[$st->zone][] = $st->lokasi;
			}

			foreach ($zone_codes as $zc) {
				// $results[$state][] = array(
				$results[] = array(
					'zone' => $zc,
					'negeri' => $state,
					'lokasi' => implode(',', $locations[$zc])
				);
			}
		}

		$final = array(
			'states' => $states,
			'results' => $results
			);

		if ($pre == 'true' || $pre == 'TRUE') {
			return '<pre>' . Helper::json_formatter(json_encode($final)) . '</pre>';
		} else {
			return response()->json($final);
		}
	}

	public function states()
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
		$final = array(
				'states' => $states
				);
		return response()->json($final);
	}

	public function coordinate(Request $request)
	{
		if ($request->has('latitude') && $request->has('longitude')) {
			$lat = $request->latitude;
			$lng = $request->longitude;
			$results = DB::select('SELECT id, zone, negeri, lokasi, lat, lng, 
				SQRT( POW( 69.1 * ( lat - ? ) , 2 ) + POW( 69.1 * ( ? - lng ) * COS( lat / 57.3 ) , 2 ) ) 
				AS distance FROM kawasan ORDER BY distance ASC LIMIT 1', [$lat, $lng]);
		} else {
			$results = Kawasan::all(); 
		}
		$pre = $request->pre;
		
		$final = array(
			'results' => $results
			);
		
		if ($pre == 'true' || $pre == 'TRUE') {
			return '<pre>' . Helper::json_formatter(json_encode($final)) . '</pre>';
		} else {
			return response()->json($final);
		}
	}

	private function _get_times($z, $f, $d, $m, $y)
	{
		$prayer_times = WaktuSolat::where('zone', '=', $z)
								  ->where('day', '=', $d)
								  ->where('month', '=', $m)
								  ->where('year', '=', $y)
								  ->get()->first();

		$w_imsak = $w_subuh = $w_syuruk = $w_zohor = $w_asar = $w_maghrib = $w_isyak = 0;
		if ($f == "12-hour") {
			$w_imsak = Helper::format_12hour($prayer_times->imsak);
			$w_subuh = Helper::format_12hour($prayer_times->subuh);
			$w_syuruk = Helper::format_12hour($prayer_times->syuruk);
			$w_zohor = Helper::format_12hour($prayer_times->zohor);
			$w_asar = Helper::format_12hour($prayer_times->asar);
			$w_maghrib = Helper::format_12hour($prayer_times->maghrib);
			$w_isyak = Helper::format_12hour($prayer_times->isyak);
		} else if ($f == "24-hour") {
			$w_imsak = Helper::format_24hour($prayer_times->imsak);
			$w_subuh = Helper::format_24hour($prayer_times->subuh);
			$w_syuruk = Helper::format_24hour($prayer_times->syuruk);
			$w_zohor = Helper::format_24hour($prayer_times->zohor);
			$w_asar = Helper::format_24hour($prayer_times->asar);
			$w_maghrib = Helper::format_24hour($prayer_times->maghrib);
			$w_isyak = Helper::format_24hour($prayer_times->isyak);
		} else {
			$w_imsak = (int) $prayer_times->imsak;
			$w_subuh = (int) $prayer_times->subuh;
			$w_syuruk = (int) $prayer_times->syuruk;
			$w_zohor = (int) $prayer_times->zohor;
			$w_asar = (int) $prayer_times->asar;
			$w_maghrib = (int) $prayer_times->maghrib;
			$w_isyak = (int) $prayer_times->isyak;
		}

		$times = array();
		$times = array(
						'date' => date('d-m-Y', mktime(0, 0, 0, $m, $d, $y)),
						'datestamp' => mktime(0, 0, 0, $m, $d, $y),
						'imsak' => $w_imsak,
						'subuh' => $w_subuh,
						'syuruk' => $w_syuruk,
						'zohor' => $w_zohor,
						'asar' => $w_asar,
						'maghrib' => $w_maghrib,
						'isyak' => $w_isyak
					);
		return $times;
	}

	private function _range_month($datestr)
	{
	    $dt = strtotime($datestr);
	    $res['start'] = strtotime('first day of this month', $dt);
	    $res['end'] = strtotime('last day of this month', $dt);
	    return $res;
    }

  	private function _range_week($datestr, $dow)
  	{
  		$dt = strtotime($datestr);
  		if (strtolower($dow) == 'sunday') {
  			$res['start'] = date('w', $dt)==0 ? $dt : strtotime('last sunday', $dt);
		    $res['end'] = date('w', $dt)==6 ? $dt : strtotime('next monday', $dt);
  		} else {
		    $res['start'] = date('N', $dt)==1 ? $dt : strtotime('last monday', $dt);
		    $res['end'] = date('N', $dt)==7 ? $dt : strtotime('next sunday', $dt);
		}
	    return $res;
    }

    private function _error($type, $desc)
    {
    	$errors = array(
    			'error_code' => 400,
    			'error_type' => $type,
    			'error_desc' => $desc
    		);
    	return response()->json($errors);
    }

}
