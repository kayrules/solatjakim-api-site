@section('title', 'Solat Jakim API (Unofficial)')
@section('disclaimer', 'active')

@extends('layouts.default')

@section('content')
<section class="vbox">
	<header class="header">
		<h2>Disclaimer</h2>
	</header>
	<div class="padder">
		<p style="font-size:15px;">
			Solat Jakim RESTful API web site is an unoffical site for serving public REST API for Waktu Solat in Malaysia provided by Jakim. All data were crawled from official e-solat Jakim website (http://www.e-solat.gov.my/web) and locally stored into our own database for fast access. No ammendment or alteration were done on the prayer times data and it will always be in original states as the source data.
		</p>
		<p class="text-muted">Last crawler update was at {{ $last_update }}</p>
	</div>
</section>
@endsection
