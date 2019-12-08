#!/usr/bin/php -q
<?php
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('Asia/Kuala_Lumpur');

require 'simple_html_dom.php';
require 'mysql.class.php';

define('PROXY', false);
define('DB_HOST','localhost');
define('DB_NAME','api_solatjakim');
define('DB_USER','euph0rix');
define('DB_PASS','@fjme90!');
define('START_MONTH',1);
define('FILENAME', 'checksum.txt');

//start process
fetchAllZones('2020');
// fetchAnnually('JHR01');

function fetchAllZones($year) {
	$file_sum = getcwd() . '/' . FILENAME;
        $db = new Mysql(DB_NAME,DB_HOST,DB_USER,DB_PASS);
        $rs = $db->db_assoc("SELECT DISTINCT zone FROM kawasan");
	$file = fopen($file_sum, "w");
        while(list(, $rw) = @each($rs)) {
                $zone = strtoupper($rw['zone']);
                fetchAnnually($zone, $file);
        }
	fclose($file);
}

function fetchAnnually($zone, $file) {
        $url = 'https://www.e-solat.gov.my/index.php?r=esolatApi/takwimsolat&period=year&zone=' . $zone;
        echo $url . "\n";
        $html = file_get_contents($url);
        $array = json_decode($html);

        $days = [
                'Monday' => 1,
                'Tuesday' => 2,
                'Wednesday' => 3,
                'Thursday' => 4,
                'Friday' => 5,
                'Saturday' => 6,
                'Sunday' => 7
        ];

        $mnths = [
                'Jan' => 1,
                'Feb' => 2,
                'Mac' => 3,
                'Apr' => 4,
                'Mei' => 5,
                'Jun' => 6,
                'Jul' => 7,
                'Ogos' => 8,
                'Sep' => 9,
                'Okt' => 10,
                'Nov' => 11,
                'Dis' => 12
        ];

	$md5sum = $zone . '|' . md5(serialize($array->prayerTime));
	fwrite($file, $md5sum . "\n");

        foreach ($array->prayerTime as $pt) {
                $date = explode('-', $pt->date);
                $d = $date[0];
                $m = $mnths[$date[1]];
                $y = $date[2];
                $obj = [
                        'zone' => $zone,
                        'day' => $d,
                        'month' => $m,
                        'year' => $y,
                        'hari' => $days[$pt->day],
                        'imsak' => dateToTimestamp($d, $m, $y, $pt->imsak),
                        'subuh' => dateToTimestamp($d, $m, $y, $pt->fajr),
                        'syuruk' => dateToTimestamp($d, $m, $y, $pt->syuruk),
                        'zohor' => dateToTimestamp($d, $m, $y, $pt->dhuhr),
                        'asar' => dateToTimestamp($d, $m, $y, $pt->asr),
                        'maghrib' => dateToTimestamp($d, $m, $y, $pt->maghrib),
                        'isyak' => dateToTimestamp($d, $m, $y, $pt->isha),
                ];
                $obj = json_decode(json_encode($obj));
                insertIntoDb($obj);
        }
}

function dateToTimestamp($D, $M, $Y, $prayer) {
        $ex = explode(':', $prayer);
        $h = $ex[0];
        $m = $ex[1];
        return mktime($h, $m, 0, $M, $D, $Y);
}

function insertIntoDb($obj) {
        $db = new Mysql(DB_NAME,DB_HOST,DB_USER,DB_PASS);
        echo "Inserting waktu solat for zone:$obj->zone, date:$obj->day-$obj->month-$obj->year";
        $db->db_insert("INSERT INTO waktu_solat SET
                zone='".$obj->zone."',
                day='".$obj->day."',
                month='".$obj->month."',
                year='".$obj->year."',
                hari='".$obj->hari."',
                imsak='".$obj->imsak."',
                subuh='".$obj->subuh."',
                syuruk='".$obj->syuruk."',
                zohor='".$obj->zohor."',
                asar='".$obj->asar."',
                maghrib='".$obj->maghrib."',
                isyak='".$obj->isyak."',
                created_at=NOW(),
                updated_at=NOW()
        ");
        echo " -- done.\n";
}

function findChecksum($str) {
	$file_sum = getcwd() . '/' . FILENAME;
	$matches = array();
	$handle = @fopen($file_sum, "r");
	if ($handle) {
   		while (!feof($handle)) {
        		$buffer = fgets($handle);
        		if(strpos($buffer, $str) !== FALSE)
            		$matches[] = $buffer;
    		}
   		fclose($handle);
	}

	echo $matches[0];
}

?>
