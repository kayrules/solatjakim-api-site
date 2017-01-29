@section('title', 'Solat Jakim API (Unofficial)')
@section('zones', 'active')

@extends('layouts.default')

@section('content')
<section class="vbox">
	<header class="header">
		<h2>Location Codes</h2>
	</header>
	<div class="padder">

    @foreach($states as $state)
		<h3>{{ $state }}</h3>
		<p>
			<table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th style="width:10%">Code</th>
              <th>Location</th>
              <th style="width:20%">Latitude</th>
              <th style="width:20%">Longitude</th>
            </tr>
          </thead>
          <tbody>
          @foreach($results[$state] as $result)
            <tr>
              <td>{{ $result['zone'] }}</td>
              <td><a href="http://maps.google.com/?q={{ $result['lat'] . ',' . $result['lng'] }}" target="_blank">{{ $result['lokasi'] }}</a></td>
              <td>{{ $result['lat'] }}</td>
              <td>{{ $result['lng'] }}</td>
            </tr>
          @endforeach
          </tbody>
      </table>
		</p>
    @endforeach
	</div>
</section>
@endsection
