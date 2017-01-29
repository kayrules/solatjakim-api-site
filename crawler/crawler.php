#!/usr/bin/php -q
<?php
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('Asia/Kuala_Lumpur');

require 'simple_html_dom.php';
require 'mysql.class.php';

define('PROXY', false);
define('DB_HOST','localhost');
define('DB_NAME','api_solatjakim');
define('DB_USER','root');
define('DB_PASS','');

define('START_MONTH',1);


//start process
fetchAllZones('2017');

function fetchAllZones($year) {
        $db = new Mysql(DB_NAME,DB_HOST,DB_USER,DB_PASS);
        $rs = $db->db_assoc("SELECT DISTINCT zone FROM kawasan");
        while(list(, $rw) = @each($rs)) {
                $zone = strtoupper($rw['zone']);
                fetchMonthly($zone, $year);
        }
}

function insertIntoMysql($zone, $year, $bulan, $ar) {
        $db = new Mysql(DB_NAME,DB_HOST,DB_USER,DB_PASS);
        foreach($ar as $v) {
                $date = $v[0];
                $exdate = explode(' ', $date);
                $day = (int)$exdate[0];
                $month = $bulan;
                $mktime = mktime(0,0,0,$month,$day,$year);
                $hari = date("N", $mktime);

                $imsak = $v[2];
                $subuh = $v[3];
                $syuruk = $v[4];
                $zohor = $v[5];
                $asar = $v[6];
                $maghrib = $v[7];
                $isyak = $v[8];

                echo "Inserting waktu solat for zone:$zone, date:$day-$month-$year";
                $db->db_insert("INSERT INTO waktu_solat SET
                        zone='".$zone."',
                        day='".$day."',
                        month='".$month."',
                        year='".$year."',
                        hari='".$hari."',
                        imsak='".$imsak."',
                        subuh='".$subuh."',
                        syuruk='".$syuruk."',
                        zohor='".$zohor."',
                        asar='".$asar."',
                        maghrib='".$maghrib."',
                        isyak='".$isyak."'
                ");
                echo " -- done.\n";
        }
}

function fetchData($zone, $year, $bulan) {
        $url = 'http://www.e-solat.gov.my/web/muatturun.php?zone='.$zone.'&state=&year='.$year.'&jenis=year&bulan='.$bulan.'&LG=BM';
        echo $url . "\n";

        if(PROXY == true) {
                $context = array
                (
                        'http' => array
                        (
                                'proxy' => '10.1.255.20:8080',
                                'request_fulluri' => true,
                        ),
                );
                $context = stream_context_create($context);
                $html = file_get_html($url, false, $context);
        } else {
                $html = file_get_html($url);
        }

    if(!$html) return 0;
        $result = $html->find('table[cellspacing="1"] tr');

        $i = 0;
        foreach($result as $element) {
            if((int)trim($element->find('font[size=2]', 0)->plaintext) > 0) {

                $ar[$i][0] = $date = parseDate($element, 0);
                // $ar[$i][1] = timeToStamp($element, 1);
                $ar[$i][2] = parseTime($element, 2, $year, $bulan, $date);
                $ar[$i][3] = parseTime($element, 3, $year, $bulan, $date);
                $ar[$i][4] = parseTime($element, 4, $year, $bulan, $date);
                $ar[$i][5] = parseTime($element, 5, $year, $bulan, $date);
                $ar[$i][6] = parseTime($element, 6, $year, $bulan, $date);
                $ar[$i][7] = parseTime($element, 7, $year, $bulan, $date);
                $ar[$i][8] = parseTime($element, 8, $year, $bulan, $date);

                $i++;
            }
        }

        if($i >= 28) insertIntoMysql($zone, $year, $bulan, $ar);
}

function parseDate($element, $index)
{
    $str = trim($element->find('font[size=2]', $index)->plaintext);
    $exdate = explode(' ', $str);
    $day = (int)$exdate[0];
    return $day;
}

function parseTime($element, $index, $year, $bulan, $date)
{
    $str = trim($element->find('font[size=2]', $index)->plaintext);
    $delimiter = ':';

    $str = preg_replace("/[^0-9]/", $delimiter, $str);

    $ex = explode($delimiter, $str);
    if($index >= 5 && $ex[0] < 12) {
        $h = $ex[0] + 12;
    } else {
        $h = $ex[0];
    }
    $m = $ex[1];

    $stamp = mktime($h, $m, 0, $bulan, $date, $year);
    // echo $date.'-'.$bulan.'-'.$year . '-------';
    // echo $str . ' -- ' . $h . $delimiter . $m . ' ===> ' . date('d-m-Y H:i', $stamp) . ' / ' . $stamp . "\n";
    return $stamp;
}

function fetchMonthly($zone, $year) {
        $db = new Mysql(DB_NAME,DB_HOST,DB_USER,DB_PASS);
        $rs = $db->db_assoc("select distinct `month` from waktu_solat where zone='".$zone."' and year='".$year."';");
        $months = array();
        while(list(,$rw) = @each($rs)) {
                $months[] = $rw['month'];
        }
        for($i=START_MONTH; $i<=12; $i++) {
            if(!in_array($i, $months)) {
                fetchData($zone, $year, $i);
            } else {
                echo 'Zone: ' . $zone . ' for ' . $i . '/' . $year . " -- Already Loaded\n";
            }
        }
}

?>
