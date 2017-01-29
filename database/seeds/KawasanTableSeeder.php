<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Kawasan;

class KawasanTableSeeder extends Seeder {

    public function run()
    {
        //DB::table('kawasan')->delete();

        Kawasan::create(array('zone' => 'JHR01', 'negeri' => 'Johor', 'lat' => 2.444152, 'lng' => 104.524746, 'lokasi' => 'Pulau Aur'));
        Kawasan::create(array('zone' => 'JHR01', 'negeri' => 'Johor', 'lat' => 2.580882, 'lng' => 104.326827, 'lokasi' => 'Pemanggil'));
        Kawasan::create(array('zone' => 'JHR02', 'negeri' => 'Johor', 'lat' => 1.729375, 'lng' => 103.899227, 'lokasi' => 'Kota Tinggi'));
        Kawasan::create(array('zone' => 'JHR02', 'negeri' => 'Johor', 'lat' => 2.430917, 'lng' => 103.836115, 'lokasi' => 'Mersing'));
        Kawasan::create(array('zone' => 'JHR02', 'negeri' => 'Johor', 'lat' => 1.492659, 'lng' => 103.741359, 'lokasi' => 'Johor Bahru'));
        Kawasan::create(array('zone' => 'JHR03', 'negeri' => 'Johor', 'lat' => 2.030068, 'lng' => 103.318464, 'lokasi' => 'Kluang'));
        Kawasan::create(array('zone' => 'JHR03', 'negeri' => 'Johor', 'lat' => 1.485561, 'lng' => 103.387859, 'lokasi' => 'Pontian'));
        Kawasan::create(array('zone' => 'JHR04', 'negeri' => 'Johor', 'lat' => 1.849442, 'lng' => 102.928834, 'lokasi' => 'Batu Pahat'));
        Kawasan::create(array('zone' => 'JHR04', 'negeri' => 'Johor', 'lat' => 2.048817, 'lng' => 102.571553, 'lokasi' => 'Muar'));
        Kawasan::create(array('zone' => 'JHR04', 'negeri' => 'Johor', 'lat' => 2.50346 , 'lng' => 102.820754, 'lokasi' => 'Segamat'));
        Kawasan::create(array('zone' => 'JHR04', 'negeri' => 'Johor', 'lat' => 2.581593, 'lng' => 102.612488, 'lokasi' => 'Gemas'));

        Kawasan::create(array('zone' => 'KDH01', 'negeri' => 'Kedah', 'lat' => 6.096953 , 'lng' => 100.353977, 'lokasi' => 'Kota Setar'));
        Kawasan::create(array('zone' => 'KDH01', 'negeri' => 'Kedah', 'lat' => 6.267335 , 'lng' => 100.425831, 'lokasi' => 'Kubang Pasu'));
        Kawasan::create(array('zone' => 'KDH01', 'negeri' => 'Kedah', 'lat' => 6.167317 , 'lng' => 100.519358, 'lokasi' => 'Pokok Sena'));
        Kawasan::create(array('zone' => 'KDH02', 'negeri' => 'Kedah', 'lat' => 5.993039 , 'lng' => 100.477339, 'lokasi' => 'Pendang'));
        Kawasan::create(array('zone' => 'KDH02', 'negeri' => 'Kedah', 'lat' => 5.644561 , 'lng' => 100.489023, 'lokasi' => 'Kuala Muda'));
        Kawasan::create(array('zone' => 'KDH02', 'negeri' => 'Kedah', 'lat' => 5.79495  , 'lng' => 100.372658, 'lokasi' => 'Yan'));
        Kawasan::create(array('zone' => 'KDH03', 'negeri' => 'Kedah', 'lat' => 6.256764 , 'lng' => 100.611034, 'lokasi' => 'Padang Terap'));
        Kawasan::create(array('zone' => 'KDH03', 'negeri' => 'Kedah', 'lat' => 5.818345 , 'lng' => 100.743021, 'lokasi' => 'Sik'));
        Kawasan::create(array('zone' => 'KDH04', 'negeri' => 'Kedah', 'lat' => 5.675547 , 'lng' => 100.916814, 'lokasi' => 'Baling'));
        Kawasan::create(array('zone' => 'KDH05', 'negeri' => 'Kedah', 'lat' => 5.371742 , 'lng' => 100.555337, 'lokasi' => 'Kulim'));
        Kawasan::create(array('zone' => 'KDH05', 'negeri' => 'Kedah', 'lat' => 5.131163 , 'lng' => 100.495534, 'lokasi' => 'Bandar Bahru'));
        Kawasan::create(array('zone' => 'KDH06', 'negeri' => 'Kedah', 'lat' => 6.35         , 'lng' => 99.8      , 'lokasi' => 'Langkawi'));
        Kawasan::create(array('zone' => 'KDH07', 'negeri' => 'Kedah', 'lat' => 5.783333 , 'lng' => 100.433333, 'lokasi' => 'Gunung Jerai'));

        Kawasan::create(array('zone' => 'KTN01', 'negeri' => 'Kelantan', 'lat' => 6.116786  , 'lng' => 102.277684, 'lokasi' => 'Kota Bahru'));
        Kawasan::create(array('zone' => 'KTN01', 'negeri' => 'Kelantan', 'lat' => 6.069586  , 'lng' => 102.397185, 'lokasi' => 'Bachok'));
        Kawasan::create(array('zone' => 'KTN01', 'negeri' => 'Kelantan', 'lat' => 5.836163  , 'lng' => 102.407741, 'lokasi' => 'Pasir Puteh'));
        Kawasan::create(array('zone' => 'KTN01', 'negeri' => 'Kelantan', 'lat' => 6.199069  , 'lng' => 102.169372, 'lokasi' => 'Tumpat'));
        Kawasan::create(array('zone' => 'KTN01', 'negeri' => 'Kelantan', 'lat' => 6.042412  , 'lng' => 102.142782, 'lokasi' => 'Pasir Mas'));
        Kawasan::create(array('zone' => 'KTN01', 'negeri' => 'Kelantan', 'lat' => 5.808887  , 'lng' => 102.147077, 'lokasi' => 'Tanah Merah'));
        Kawasan::create(array('zone' => 'KTN01', 'negeri' => 'Kelantan', 'lat' => 5.767933  , 'lng' => 102.215387, 'lokasi' => 'Machang'));
        Kawasan::create(array('zone' => 'KTN01', 'negeri' => 'Kelantan', 'lat' => 5.530813  , 'lng' => 102.201851, 'lokasi' => 'Kuala Krai'));
        Kawasan::create(array('zone' => 'KTN01', 'negeri' => 'Kelantan', 'lat' => 4.916993  , 'lng' => 102.177656, 'lokasi' => 'Mukim Chiku'));
        Kawasan::create(array('zone' => 'KTN03', 'negeri' => 'Kelantan', 'lat' => 5.700699  , 'lng' => 101.843151, 'lokasi' => 'Jeli'));
        Kawasan::create(array('zone' => 'KTN03', 'negeri' => 'Kelantan', 'lat' => 4.884279  , 'lng' => 101.968178, 'lokasi' => 'Gua Musang'));
        Kawasan::create(array('zone' => 'KTN03', 'negeri' => 'Kelantan', 'lat' => 4.828924  , 'lng' => 101.934807, 'lokasi' => 'Mukim Galas'));
        Kawasan::create(array('zone' => 'KTN03', 'negeri' => 'Kelantan', 'lat' => 5.151936  , 'lng' => 102.043792, 'lokasi' => 'Bertam'));

        Kawasan::create(array('zone' => 'MLK01', 'negeri' => 'Melaka', 'lat' => 2.197138    , 'lng' => 102.24907 , 'lokasi' => 'Bandar Melaka'));
        Kawasan::create(array('zone' => 'MLK01', 'negeri' => 'Melaka', 'lat' => 2.382211    , 'lng' => 102.211561, 'lokasi' => 'Alor Gajah'));
        Kawasan::create(array('zone' => 'MLK01', 'negeri' => 'Melaka', 'lat' => 2.311337    , 'lng' => 102.430923, 'lokasi' => 'Jasin'));
        Kawasan::create(array('zone' => 'MLK01', 'negeri' => 'Melaka', 'lat' => 2.352279    , 'lng' => 102.108926, 'lokasi' => 'Masjid Tanah'));
        Kawasan::create(array('zone' => 'MLK01', 'negeri' => 'Melaka', 'lat' => 2.145214    , 'lng' => 102.422383, 'lokasi' => 'Merlimau'));
        Kawasan::create(array('zone' => 'MLK01', 'negeri' => 'Melaka', 'lat' => 2.436091    , 'lng' => 102.469871, 'lokasi' => 'Nyalas'));

        Kawasan::create(array('zone' => 'NGS01', 'negeri' => 'Negeri Sembilan', 'lat' => 2.896577   , 'lng' => 102.405454, 'lokasi' => 'Jempol'));
        Kawasan::create(array('zone' => 'NGS01', 'negeri' => 'Negeri Sembilan', 'lat' => 2.472971   , 'lng' => 102.231194, 'lokasi' => 'Tampin'));
        Kawasan::create(array('zone' => 'NGS02', 'negeri' => 'Negeri Sembilan', 'lat' => 2.52254    , 'lng' => 101.796293, 'lokasi' => 'Port Dickson'));
        Kawasan::create(array('zone' => 'NGS02', 'negeri' => 'Negeri Sembilan', 'lat' => 2.725889   , 'lng' => 101.937824, 'lokasi' => 'Seremban'));
        Kawasan::create(array('zone' => 'NGS02', 'negeri' => 'Negeri Sembilan', 'lat' => 2.740474   , 'lng' => 102.248872, 'lokasi' => 'Kuala Pilah'));
        Kawasan::create(array('zone' => 'NGS02', 'negeri' => 'Negeri Sembilan', 'lat' => 2.941072   , 'lng' => 102.07191 , 'lokasi' => 'Jelebu'));
        Kawasan::create(array('zone' => 'NGS02', 'negeri' => 'Negeri Sembilan', 'lat' => 2.590525   , 'lng' => 102.092986, 'lokasi' => 'Rembau'));

        Kawasan::create(array('zone' => 'PHG01', 'negeri' => 'Pahang', 'lat' => 2.790249    , 'lng' => 104.169846, 'lokasi' => 'Pulau Tioman'));
        Kawasan::create(array('zone' => 'PHG02', 'negeri' => 'Pahang', 'lat' => 3.816667    , 'lng' => 103.333333, 'lokasi' => 'Kuantan'));
        Kawasan::create(array('zone' => 'PHG02', 'negeri' => 'Pahang', 'lat' => 3.492095    , 'lng' => 103.389545, 'lokasi' => 'Pekan'));
        Kawasan::create(array('zone' => 'PHG02', 'negeri' => 'Pahang', 'lat' => 2.688626    , 'lng' => 102.522802, 'lokasi' => 'Rompin'));
        Kawasan::create(array('zone' => 'PHG02', 'negeri' => 'Pahang', 'lat' => 3.056192    , 'lng' => 103.085225, 'lokasi' => 'Muadzam Shah'));
        Kawasan::create(array('zone' => 'PHG03', 'negeri' => 'Pahang', 'lat' => 3.58338 , 'lng' => 102.779065,   'lokasi' => 'Maran'));
        Kawasan::create(array('zone' => 'PHG03', 'negeri' => 'Pahang', 'lat' => 3.493743    , 'lng' => 102.58185 , 'lokasi' => 'Chenor'));
        Kawasan::create(array('zone' => 'PHG03', 'negeri' => 'Pahang', 'lat' => 3.448649    , 'lng' => 102.416348, 'lokasi' => 'Temerloh'));
        Kawasan::create(array('zone' => 'PHG03', 'negeri' => 'Pahang', 'lat' => 3.270526    , 'lng' => 102.453864, 'lokasi' => 'Bera'));
        Kawasan::create(array('zone' => 'PHG03', 'negeri' => 'Pahang', 'lat' => 3.937395    , 'lng' => 102.362038, 'lokasi' => 'Jerantut'));
        Kawasan::create(array('zone' => 'PHG04', 'negeri' => 'Pahang', 'lat' => 3.522168    , 'lng' => 101.910353, 'lokasi' => 'Bentong'));
        Kawasan::create(array('zone' => 'PHG04', 'negeri' => 'Pahang', 'lat' => 3.793532    , 'lng' => 101.857465, 'lokasi' => 'Raub'));
        Kawasan::create(array('zone' => 'PHG04', 'negeri' => 'Pahang', 'lat' => 4.18433 , 'lng' => 102.054232,   'lokasi' => 'Kuala Lipis'));
        Kawasan::create(array('zone' => 'PHG05', 'negeri' => 'Pahang', 'lat' => 3.35            , 'lng' => 101.783333, 'lokasi' => 'Genting Sempah'));
        Kawasan::create(array('zone' => 'PHG05', 'negeri' => 'Pahang', 'lat' => 3.35            , 'lng' => 101.883333, 'lokasi' => 'Janda Baik'));
        Kawasan::create(array('zone' => 'PHG05', 'negeri' => 'Pahang', 'lat' => 3.400997    , 'lng' => 101.846822, 'lokasi' => 'Mukit Tinggi'));
        Kawasan::create(array('zone' => 'PHG06', 'negeri' => 'Pahang', 'lat' => 3.711868    , 'lng' => 101.736556, 'lokasi' => 'Bukit Fraser'));
        Kawasan::create(array('zone' => 'PHG06', 'negeri' => 'Pahang', 'lat' => 3.423978    , 'lng' => 101.793201, 'lokasi' => 'Genting Highlands'));
        Kawasan::create(array('zone' => 'PHG06', 'negeri' => 'Pahang', 'lat' => 4.47212 , 'lng' => 101.380144,   'lokasi' => 'Cameron Highlands'));

        Kawasan::create(array('zone' => 'PLS01', 'negeri' => 'Perlis', 'lat' => 6.440633    , 'lng' => 100.198371, 'lokasi' => 'Kangar'));
        Kawasan::create(array('zone' => 'PLS01', 'negeri' => 'Perlis', 'lat' => 6.662622    , 'lng' => 100.321665, 'lokasi' => 'Padang Besar'));
        Kawasan::create(array('zone' => 'PLS01', 'negeri' => 'Perlis', 'lat' => 6.429708    , 'lng' => 100.269847, 'lokasi' => 'Arau'));

        Kawasan::create(array('zone' => 'PNG01', 'negeri' => 'Pulau Pinang', 'lat' => 5.414168  , 'lng' => 100.328759, 'lokasi' => 'Pulau Pinang'));

        Kawasan::create(array('zone' => 'PRK01', 'negeri' => 'Perak', 'lat' => 4.19773  , 'lng' => 101.261529, 'lokasi' => 'Tapah'));
        Kawasan::create(array('zone' => 'PRK01', 'negeri' => 'Perak', 'lat' => 3.830025 , 'lng' => 101.404645, 'lokasi' => 'Slim River'));
        Kawasan::create(array('zone' => 'PRK01', 'negeri' => 'Perak', 'lat' => 3.705842 , 'lng' => 101.504916, 'lokasi' => 'Tanjung Malim'));
        Kawasan::create(array('zone' => 'PRK02', 'negeri' => 'Perak', 'lat' => 4.597479 , 'lng' => 101.090106, 'lokasi' => 'Ipoh'));
        Kawasan::create(array('zone' => 'PRK02', 'negeri' => 'Perak', 'lat' => 4.472081 , 'lng' => 101.04124 , 'lokasi' => 'Batu Gajah'));
        Kawasan::create(array('zone' => 'PRK02', 'negeri' => 'Perak', 'lat' => 4.308504 , 'lng' => 101.153653, 'lokasi' => 'Kampar'));
        Kawasan::create(array('zone' => 'PRK02', 'negeri' => 'Perak', 'lat' => 4.819012 , 'lng' => 101.073718, 'lokasi' => 'Sungai Siput'));
        Kawasan::create(array('zone' => 'PRK02', 'negeri' => 'Perak', 'lat' => 4.773595 , 'lng' => 100.942045, 'lokasi' => 'Kuala Kangsar'));
        Kawasan::create(array('zone' => 'PRK03', 'negeri' => 'Perak', 'lat' => 5.70644  , 'lng' => 100.999837, 'lokasi' => 'Pengkalan Hulu'));
        Kawasan::create(array('zone' => 'PRK03', 'negeri' => 'Perak', 'lat' => 5.428454 , 'lng' => 101.129703, 'lokasi' => 'Grid'));
        Kawasan::create(array('zone' => 'PRK03', 'negeri' => 'Perak', 'lat' => 5.10844  , 'lng' => 100.968034, 'lokasi' => 'Lenggong'));
        Kawasan::create(array('zone' => 'PRK04', 'negeri' => 'Perak', 'lat' => 5.333186 , 'lng' => 101.367712, 'lokasi' => 'Temenggung'));
        Kawasan::create(array('zone' => 'PRK04', 'negeri' => 'Perak', 'lat' => 5.740126 , 'lng' => 101.47935 , 'lokasi' => 'Belum'));
        Kawasan::create(array('zone' => 'PRK05', 'negeri' => 'Perak', 'lat' => 4.022424 , 'lng' => 101.020625, 'lokasi' => 'Teluk Intan'));
        Kawasan::create(array('zone' => 'PRK05', 'negeri' => 'Perak', 'lat' => 3.99191  , 'lng' => 100.786148, 'lokasi' => 'Bagan Datoh'));
        Kawasan::create(array('zone' => 'PRK05', 'negeri' => 'Perak', 'lat' => 4.184167 , 'lng' => 100.938719, 'lokasi' => 'Kampung Gajah'));
        Kawasan::create(array('zone' => 'PRK05', 'negeri' => 'Perak', 'lat' => 4.357145 , 'lng' => 100.963392, 'lokasi' => 'Sri Iskandar'));
        Kawasan::create(array('zone' => 'PRK05', 'negeri' => 'Perak', 'lat' => 4.500804 , 'lng' => 100.781508, 'lokasi' => 'Beruas'));
        Kawasan::create(array('zone' => 'PRK05', 'negeri' => 'Perak', 'lat' => 4.476689 , 'lng' => 100.909749, 'lokasi' => 'Parit'));
        Kawasan::create(array('zone' => 'PRK05', 'negeri' => 'Perak', 'lat' => 4.236302 , 'lng' => 100.63222 , 'lokasi' => 'Lumut'));
        Kawasan::create(array('zone' => 'PRK05', 'negeri' => 'Perak', 'lat' => 4.216825 , 'lng' => 100.697824, 'lokasi' => 'Setiawan'));
        Kawasan::create(array('zone' => 'PRK05', 'negeri' => 'Perak', 'lat' => 4.227491 , 'lng' => 100.557741, 'lokasi' => 'Pulau Pangkor'));
        Kawasan::create(array('zone' => 'PRK06', 'negeri' => 'Perak', 'lat' => 5.218462 , 'lng' => 100.69346 , 'lokasi' => 'Selama'));
        Kawasan::create(array('zone' => 'PRK06', 'negeri' => 'Perak', 'lat' => 4.851932 , 'lng' => 100.741634, 'lokasi' => 'Taiping'));
        Kawasan::create(array('zone' => 'PRK06', 'negeri' => 'Perak', 'lat' => 5.008062 , 'lng' => 100.53943 , 'lokasi' => 'Bagan Serai'));
        Kawasan::create(array('zone' => 'PRK06', 'negeri' => 'Perak', 'lat' => 5.118682 , 'lng' => 100.488016, 'lokasi' => 'Parit Buntar'));
        Kawasan::create(array('zone' => 'PRK07', 'negeri' => 'Perak', 'lat' => 4.8623       , 'lng' => 100.793   , 'lokasi' => 'Bukit Larut'));

        Kawasan::create(array('zone' => 'SBH01', 'negeri' => 'Sabah', 'lat' => 5.839444 , 'lng' => 118.117173, 'lokasi' => 'Sandakan'));
        Kawasan::create(array('zone' => 'SBH01', 'negeri' => 'Sabah', 'lat' => 5.500122 , 'lng' => 117.837606, 'lokasi' => 'Bandar Bukir Garam'));
        Kawasan::create(array('zone' => 'SBH01', 'negeri' => 'Sabah', 'lat' => 5.9166667, 'lng' => 117.766666, 'lokasi' => 'Semawang'));
        Kawasan::create(array('zone' => 'SBH01', 'negeri' => 'Sabah', 'lat' => 4.910632 , 'lng' => 114.934834, 'lokasi' => 'Temanggong'));
        Kawasan::create(array('zone' => 'SBH01', 'negeri' => 'Sabah', 'lat' => 5.450148 , 'lng' => 119.109986, 'lokasi' => 'Tambisan'));
        Kawasan::create(array('zone' => 'SBH02', 'negeri' => 'Sabah', 'lat' => 4.990731 , 'lng' => 116.832411, 'lokasi' => 'Pinangah'));
        Kawasan::create(array('zone' => 'SBH02', 'negeri' => 'Sabah', 'lat' => 6.426081 , 'lng' => 117.687599, 'lokasi' => 'Terusan'));
        Kawasan::create(array('zone' => 'SBH02', 'negeri' => 'Sabah', 'lat' => 5.70207  , 'lng' => 117.401544, 'lokasi' => 'Beluran'));
        Kawasan::create(array('zone' => 'SBH02', 'negeri' => 'Sabah', 'lat' => 5.015856 , 'lng' => 117.353107, 'lokasi' => 'Kuamut'));
        Kawasan::create(array('zone' => 'SBH02', 'negeri' => 'Sabah', 'lat' => 5.627233 , 'lng' => 117.127534, 'lokasi' => 'Telupit'));
        Kawasan::create(array('zone' => 'SBH03', 'negeri' => 'Sabah', 'lat' => 5.024206 , 'lng' => 118.330746, 'lokasi' => 'Lahad Datu'));
        Kawasan::create(array('zone' => 'SBH03', 'negeri' => 'Sabah', 'lat' => 4.686116 , 'lng' => 118.251146, 'lokasi' => 'Kunak'));
        Kawasan::create(array('zone' => 'SBH03', 'negeri' => 'Sabah', 'lat' => 5.136667 , 'lng' => 118.614167, 'lokasi' => 'Silabukan'));
        Kawasan::create(array('zone' => 'SBH03', 'negeri' => 'Sabah', 'lat' => 4.931209 , 'lng' => 114.911622, 'lokasi' => 'Tungku'));
        Kawasan::create(array('zone' => 'SBH03', 'negeri' => 'Sabah', 'lat' => 5.078867 , 'lng' => 119.070775, 'lokasi' => 'Sahabat'));
        Kawasan::create(array('zone' => 'SBH03', 'negeri' => 'Sabah', 'lat' => 4.479391 , 'lng' => 118.611545, 'lokasi' => 'Semporna'));
        Kawasan::create(array('zone' => 'SBH04', 'negeri' => 'Sabah', 'lat' => 4.244651 , 'lng' => 117.891186, 'lokasi' => 'Tawau'));
        Kawasan::create(array('zone' => 'SBH04', 'negeri' => 'Sabah', 'lat' => 4.398421 , 'lng' => 118.058604, 'lokasi' => 'Balong'));
        Kawasan::create(array('zone' => 'SBH04', 'negeri' => 'Sabah', 'lat' => 4.356929 , 'lng' => 117.827169, 'lokasi' => 'Merotai'));
        Kawasan::create(array('zone' => 'SBH04', 'negeri' => 'Sabah', 'lat' => 4.411679 , 'lng' => 117.492699, 'lokasi' => 'Kalabakan'));
        Kawasan::create(array('zone' => 'SBH05', 'negeri' => 'Sabah', 'lat' => 6.88684  , 'lng' => 116.825311, 'lokasi' => 'Kudat'));
        Kawasan::create(array('zone' => 'SBH05', 'negeri' => 'Sabah', 'lat' => 6.465705 , 'lng' => 116.726409, 'lokasi' => 'Kota Marudu'));
        Kawasan::create(array('zone' => 'SBH05', 'negeri' => 'Sabah', 'lat' => 6.722237 , 'lng' => 117.055273, 'lokasi' => 'Pitas'));
        Kawasan::create(array('zone' => 'SBH05', 'negeri' => 'Sabah', 'lat' => 7.26726  , 'lng' => 117.150005, 'lokasi' => 'Pulau Banggi'));
        Kawasan::create(array('zone' => 'SBH06', 'negeri' => 'Sabah', 'lat' => 6.074544 , 'lng' => 116.56272 , 'lokasi' => 'Gunung Kinabalu'));
        Kawasan::create(array('zone' => 'SBH07', 'negeri' => 'Sabah', 'lat' => 5.734628 , 'lng' => 115.931851, 'lokasi' => 'Papar'));
        Kawasan::create(array('zone' => 'SBH07', 'negeri' => 'Sabah', 'lat' => 5.953561 , 'lng' => 116.66395 , 'lokasi' => 'Ranau'));
        Kawasan::create(array('zone' => 'SBH07', 'negeri' => 'Sabah', 'lat' => 6.353248 , 'lng' => 116.427877, 'lokasi' => 'Kota Belud'));
        Kawasan::create(array('zone' => 'SBH07', 'negeri' => 'Sabah', 'lat' => 6.176269 , 'lng' => 116.23279 , 'lokasi' => 'Tuaran'));
        Kawasan::create(array('zone' => 'SBH07', 'negeri' => 'Sabah', 'lat' => 5.914199 , 'lng' => 116.107663, 'lokasi' => 'Penampang'));
        Kawasan::create(array('zone' => 'SBH07', 'negeri' => 'Sabah', 'lat' => 5.980408 , 'lng' => 116.073457, 'lokasi' => 'Kota Kinabalu'));
        Kawasan::create(array('zone' => 'SBH08', 'negeri' => 'Sabah', 'lat' => 4.55         , 'lng' => 116.316667, 'lokasi' => 'Pensiangan'));
        Kawasan::create(array('zone' => 'SBH08', 'negeri' => 'Sabah', 'lat' => 5.337404 , 'lng' => 116.15668 , 'lokasi' => 'Keningau'));
        Kawasan::create(array('zone' => 'SBH08', 'negeri' => 'Sabah', 'lat' => 5.721291 , 'lng' => 116.410779, 'lokasi' => 'Tambunan'));
        Kawasan::create(array('zone' => 'SBH08', 'negeri' => 'Sabah', 'lat' => 5.122208 , 'lng' => 116.432583, 'lokasi' => 'Nabawan'));
        Kawasan::create(array('zone' => 'SBH09', 'negeri' => 'Sabah', 'lat' => 5.07919  , 'lng' => 115.550825, 'lokasi' => 'Sipitang'));
        Kawasan::create(array('zone' => 'SBH09', 'negeri' => 'Sabah', 'lat' => 5.527729 , 'lng' => 115.695961, 'lokasi' => 'Membakut'));
        Kawasan::create(array('zone' => 'SBH09', 'negeri' => 'Sabah', 'lat' => 5.345118 , 'lng' => 115.745112, 'lokasi' => 'Beaufort'));
        Kawasan::create(array('zone' => 'SBH09', 'negeri' => 'Sabah', 'lat' => 5.571717 , 'lng' => 115.597146, 'lokasi' => 'Kuala Penyu'));
        Kawasan::create(array('zone' => 'SBH09', 'negeri' => 'Sabah', 'lat' => 5.216881 , 'lng' => 115.598801, 'lokasi' => 'Weston'));
        Kawasan::create(array('zone' => 'SBH09', 'negeri' => 'Sabah', 'lat' => 5.130495 , 'lng' => 115.945455, 'lokasi' => 'Tenom'));
        Kawasan::create(array('zone' => 'SBH09', 'negeri' => 'Sabah', 'lat' => 5.97884  , 'lng' => 116.07532 , 'lokasi' => 'Long Pa Sia'));

        Kawasan::create(array('zone' => 'SGR01', 'negeri' => 'Selangor', 'lat' => 3.253502  , 'lng' => 101.653326, 'lokasi' => 'Gombak'));
        Kawasan::create(array('zone' => 'SGR01', 'negeri' => 'Selangor', 'lat' => 3.560105  , 'lng' => 101.658312, 'lokasi' => 'Hulu Selangor'));
        Kawasan::create(array('zone' => 'SGR01', 'negeri' => 'Selangor', 'lat' => 3.320482  , 'lng' => 101.575924, 'lokasi' => 'Rawang'));
        Kawasan::create(array('zone' => 'SGR01', 'negeri' => 'Selangor', 'lat' => 3.113117  , 'lng' => 101.815673, 'lokasi' => 'Hulu Langat'));
        Kawasan::create(array('zone' => 'SGR01', 'negeri' => 'Selangor', 'lat' => 2.691369  , 'lng' => 101.750527, 'lokasi' => 'Sepang'));
        Kawasan::create(array('zone' => 'SGR01', 'negeri' => 'Selangor', 'lat' => 3.184624  , 'lng' => 101.535967, 'lokasi' => 'Petaling Jaya'));
        Kawasan::create(array('zone' => 'SGR01', 'negeri' => 'Selangor', 'lat' => 3.073281  , 'lng' => 101.518461, 'lokasi' => 'Shah Alam'));
        Kawasan::create(array('zone' => 'SGR02', 'negeri' => 'Selangor', 'lat' => 3.678777  , 'lng' => 100.990592, 'lokasi' => 'Sabak Bernam'));
        Kawasan::create(array('zone' => 'SGR02', 'negeri' => 'Selangor', 'lat' => 3.340184  , 'lng' => 101.249762, 'lokasi' => 'Kuala Selangor'));
        Kawasan::create(array('zone' => 'SGR02', 'negeri' => 'Selangor', 'lat' => 3.044917  , 'lng' => 101.445562, 'lokasi' => 'Klang'));
        Kawasan::create(array('zone' => 'SGR02', 'negeri' => 'Selangor', 'lat' => 2.803828  , 'lng' => 101.49507 , 'lokasi' => 'Kuala Langat'));

        Kawasan::create(array('zone' => 'SGR03', 'negeri' => 'Kuala Lumpur', 'lat' => 3.139003  , 'lng' => 101.686855, 'lokasi' => 'Kuala Lumpur'));
        Kawasan::create(array('zone' => 'SGR04', 'negeri' => 'Putrajaya'     , 'lat' => 2.926361    , 'lng' => 101.696445, 'lokasi' => 'Putrajaya'));

        Kawasan::create(array('zone' => 'SWK01', 'negeri' => 'Sarawak', 'lat' => 4.755032   , 'lng' => 115.008146, 'lokasi' => 'Limbang'));
        Kawasan::create(array('zone' => 'SWK01', 'negeri' => 'Sarawak', 'lat' => 4.887442   , 'lng' => 115.226701, 'lokasi' => 'Sundar'));
        Kawasan::create(array('zone' => 'SWK01', 'negeri' => 'Sarawak', 'lat' => 4.2833333  , 'lng' => 115.616666, 'lokasi' => 'Terusan'));
        Kawasan::create(array('zone' => 'SWK01', 'negeri' => 'Sarawak', 'lat' => 4.83495    , 'lng' => 115.393738, 'lokasi' => 'Lawas'));
        Kawasan::create(array('zone' => 'SWK02', 'negeri' => 'Sarawak', 'lat' => 3.866516   , 'lng' => 113.730859, 'lokasi' => 'Niah'));
        Kawasan::create(array('zone' => 'SWK02', 'negeri' => 'Sarawak', 'lat' => 3.200278   , 'lng' => 113.934714, 'lokasi' => 'Belaga'));
        Kawasan::create(array('zone' => 'SWK02', 'negeri' => 'Sarawak', 'lat' => 4.045211   , 'lng' => 113.799896, 'lokasi' => 'Sibuti'));
        Kawasan::create(array('zone' => 'SWK02', 'negeri' => 'Sarawak', 'lat' => 4.399493   , 'lng' => 113.991383, 'lokasi' => 'Miri'));
        Kawasan::create(array('zone' => 'SWK02', 'negeri' => 'Sarawak', 'lat' => 4.058185   , 'lng' => 113.844193, 'lokasi' => 'Bekenu'));
        Kawasan::create(array('zone' => 'SWK02', 'negeri' => 'Sarawak', 'lat' => 4.40634   , 'lng' => 114.26283, 'lokasi' => 'Marudi'));
        Kawasan::create(array('zone' => 'SWK03', 'negeri' => 'Sarawak', 'lat' => 2.00644    , 'lng' => 112.54976  , 'lokasi' => 'Song'));
        Kawasan::create(array('zone' => 'SWK03', 'negeri' => 'Sarawak', 'lat' => 2.93087    , 'lng' => 112.53954,  'lokasi' => 'Balingian'));
        Kawasan::create(array('zone' => 'SWK03', 'negeri' => 'Sarawak', 'lat' => 3.06303    , 'lng' => 113.47761, 'lokasi' => 'Sebauh'));
        Kawasan::create(array('zone' => 'SWK03', 'negeri' => 'Sarawak', 'lat' => 3.171322   , 'lng' => 113.041907, 'lokasi' => 'Bintulu'));
        Kawasan::create(array('zone' => 'SWK03', 'negeri' => 'Sarawak', 'lat' => 2.87896    , 'lng' => 112.855621, 'lokasi' => 'Tatau'));
        Kawasan::create(array('zone' => 'SWK03', 'negeri' => 'Sarawak', 'lat' => 1.995115   , 'lng' => 112.933085, 'lokasi' => 'Kapit'));
        Kawasan::create(array('zone' => 'SWK04', 'negeri' => 'Sarawak', 'lat' => 2.823991   , 'lng' => 111.710899, 'lokasi' => 'Igan'));
        Kawasan::create(array('zone' => 'SWK04', 'negeri' => 'Sarawak', 'lat' => 2.101223   , 'lng' => 112.153298, 'lokasi' => 'Kanowit'));
        Kawasan::create(array('zone' => 'SWK04', 'negeri' => 'Sarawak', 'lat' => 2.287284   , 'lng' => 111.830535, 'lokasi' => 'Sibu'));
        Kawasan::create(array('zone' => 'SWK04', 'negeri' => 'Sarawak', 'lat' => 2.6666667  , 'lng' => 112.083333, 'lokasi' => 'Dalat'));
        Kawasan::create(array('zone' => 'SWK04', 'negeri' => 'Sarawak', 'lat' => 2.858436   , 'lng' => 111.875922, 'lokasi' => 'Oya'));
        Kawasan::create(array('zone' => 'SWK05', 'negeri' => 'Sarawak', 'lat' => 2.220691   , 'lng' => 111.218333, 'lokasi' => 'Belawai'));
        Kawasan::create(array('zone' => 'SWK05', 'negeri' => 'Sarawak', 'lat' => 2.695497   , 'lng' => 111.471668, 'lokasi' => 'Matu'));
        Kawasan::create(array('zone' => 'SWK05', 'negeri' => 'Sarawak', 'lat' => 2.527996   , 'lng' => 111.417057, 'lokasi' => 'Daro'));
        Kawasan::create(array('zone' => 'SWK05', 'negeri' => 'Sarawak', 'lat' => 2.131703   , 'lng' => 111.523728, 'lokasi' => 'Sarikei'));
        Kawasan::create(array('zone' => 'SWK05', 'negeri' => 'Sarawak', 'lat' => 2.024275   , 'lng' => 111.916609, 'lokasi' => 'Julau'));
        Kawasan::create(array('zone' => 'SWK05', 'negeri' => 'Sarawak', 'lat' => 2.169966   , 'lng' => 111.636641, 'lokasi' => 'Bitangor'));
        Kawasan::create(array('zone' => 'SWK05', 'negeri' => 'Sarawak', 'lat' => 2.137227   , 'lng' => 111.224885, 'lokasi' => 'Rajang'));
        Kawasan::create(array('zone' => 'SWK06', 'negeri' => 'Sarawak', 'lat' => 1.803557   , 'lng' => 111.130108, 'lokasi' => 'Kabong'));
        Kawasan::create(array('zone' => 'SWK06', 'negeri' => 'Sarawak', 'lat' => 1.25       , 'lng' => 111.166666, 'lokasi' => 'Lingga'));
        Kawasan::create(array('zone' => 'SWK06', 'negeri' => 'Sarawak', 'lat' => 1.237031   , 'lng' => 111.462079, 'lokasi' => 'Sri Aman'));
        Kawasan::create(array('zone' => 'SWK06', 'negeri' => 'Sarawak', 'lat' => 1.138464   , 'lng' => 111.666259, 'lokasi' => 'Engkelili'));
        Kawasan::create(array('zone' => 'SWK06', 'negeri' => 'Sarawak', 'lat' => 1.411517   , 'lng' => 111.528999, 'lokasi' => 'Betong'));
        Kawasan::create(array('zone' => 'SWK06', 'negeri' => 'Sarawak', 'lat' => 1.462578   , 'lng' => 111.479364, 'lokasi' => 'Spaoh'));
        Kawasan::create(array('zone' => 'SWK06', 'negeri' => 'Sarawak', 'lat' => 1.619999   , 'lng' => 111.291599, 'lokasi' => 'Pusa'));
        Kawasan::create(array('zone' => 'SWK06', 'negeri' => 'Sarawak', 'lat' => 1.738795   , 'lng' => 111.33784 , 'lokasi' => 'Saratok'));
        Kawasan::create(array('zone' => 'SWK06', 'negeri' => 'Sarawak', 'lat' => 1.866759   , 'lng' => 111.334493, 'lokasi' => 'Roban'));
        Kawasan::create(array('zone' => 'SWK06', 'negeri' => 'Sarawak', 'lat' => 1.56267    , 'lng' => 111.422177, 'lokasi' => 'Debak'));
        Kawasan::create(array('zone' => 'SWK07', 'negeri' => 'Sarawak', 'lat' => 1.442757   , 'lng' => 110.497711, 'lokasi' => 'Samarahan'));
        Kawasan::create(array('zone' => 'SWK07', 'negeri' => 'Sarawak', 'lat' => 1.072972   , 'lng' => 110.915332, 'lokasi' => 'Simunjan'));
        Kawasan::create(array('zone' => 'SWK07', 'negeri' => 'Sarawak', 'lat' => 1.167035   , 'lng' => 110.566506, 'lokasi' => 'Serian'));
        Kawasan::create(array('zone' => 'SWK07', 'negeri' => 'Sarawak', 'lat' => 1.396803   , 'lng' => 111.071899, 'lokasi' => 'Sebuyau'));
        Kawasan::create(array('zone' => 'SWK07', 'negeri' => 'Sarawak', 'lat' => 1.476546   , 'lng' => 111.213336, 'lokasi' => 'Meludam'));
        Kawasan::create(array('zone' => 'SWK08', 'negeri' => 'Sarawak', 'lat' => 1.56           , 'lng' => 110.345   , 'lokasi' => 'Kuching'));
        Kawasan::create(array('zone' => 'SWK08', 'negeri' => 'Sarawak', 'lat' => 1.417224   , 'lng' => 110.154629, 'lokasi' => 'Bau'));
        Kawasan::create(array('zone' => 'SWK08', 'negeri' => 'Sarawak', 'lat' => 1.671364   , 'lng' => 109.851969, 'lokasi' => 'Lundu'));
        Kawasan::create(array('zone' => 'SWK08', 'negeri' => 'Sarawak', 'lat' => 1.807459   , 'lng' => 109.775842, 'lokasi' => 'Sematan'));
        Kawasan::create(array('zone' => 'SWK09', 'negeri' => 'Sarawak', 'lat' => 4.96258    , 'lng' => 115.554338, 'lokasi' => 'Zon Khas'));

        Kawasan::create(array('zone' => 'TRG01', 'negeri' => 'Terengganu', 'lat' => 5.329624    , 'lng' => 103.137014, 'lokasi' => 'Kuala Terengganu'));
        Kawasan::create(array('zone' => 'TRG01', 'negeri' => 'Terengganu', 'lat' => 5.207711    , 'lng' => 103.204944, 'lokasi' => 'Marang'));
        Kawasan::create(array('zone' => 'TRG02', 'negeri' => 'Terengganu', 'lat' => 5.829012    , 'lng' => 102.552378, 'lokasi' => 'Besut'));
        Kawasan::create(array('zone' => 'TRG02', 'negeri' => 'Terengganu', 'lat' => 5.443798    , 'lng' => 102.825218, 'lokasi' => 'Setiu'));
        Kawasan::create(array('zone' => 'TRG03', 'negeri' => 'Terengganu', 'lat' => 5.073042    , 'lng' => 103.008937, 'lokasi' => 'Hulu Terengganu'));
        Kawasan::create(array('zone' => 'TRG04', 'negeri' => 'Terengganu', 'lat' => 4.77779 , 'lng' => 103.033887,   'lokasi' => 'Kemaman'));
        Kawasan::create(array('zone' => 'TRG04', 'negeri' => 'Terengganu', 'lat' => 4.77779 , 'lng' => 103.033887,   'lokasi' => 'Dungun'));

        Kawasan::create(array('zone' => 'WLY02', 'negeri' => 'Labuan', 'lat' => 5.275346    , 'lng' => 115.247346, 'lokasi' => 'Labuan'));

    }
}
