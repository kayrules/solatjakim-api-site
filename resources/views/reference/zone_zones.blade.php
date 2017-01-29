@section('title', 'Solat Jakim API (Unofficial)')
@section('reference', 'active')
@section('zone_zones', 'active')

@extends('layouts.default')

@section('content')
<section class="vbox">
	<header class="header">
		<h2>GET zone/zones</h2>
	</header>
	<div class="padder">
		<p>
			Returns all zones including their codes and coordinates.
		</p>

		<h3>Resource URL</h3>
		<p>
			<pre>{{ Helper::site_domain() . '/zone/zones.json' }}</pre>
		</p>

		<h3>Parameters</h3>
		<p>
			<table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 100px">Parameter</th>
                  <th>Remark</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody>
				 <tr>
                    <td><strong>state</strong></td>
                    <td>Optional</td>
                    <td>The state within Malaysia. <br>
                    <strong>Input:</strong> Johor / Kedah / Kelantan / Melaka / Negeri Sembilan / Pahang / Perak / Perlis / Pulau Pinang / Sabah / Sarawak / Selangor / Terengganu / Putrajaya / Kuala Lumpur / Labuan</a>.</td>
                  </tr>
				<tr>
                  <td><strong>zone</strong></td>
                  <td>Optional</td>
                  <td>The location code based on prayer time zones provided by Jakim. <br>
                  <strong>Input:</strong> Refer to <a href="{{ route('home.zones') }}">zone codes here</a>.</td>
                </tr>
                <tr>
                  <td><strong>pre</strong></td>
                  <td>Optional</td>
                  <td>
                    Show result in preformatted text enclosed with &lt;pre&gt; tags. <br>
                    <strong>Input:</strong> true / false
                    <br><strong>Default:</strong> false
                  </td>
                </tr>
              </tbody>
            </table>
		</p>

    <h3>Response Fields</h3>
    <p>
      <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 100px">Parameter</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>states</strong></td>
                  <td>
                  List all states within Malaysia based on selected `state` filter.
                  </td>
                </tr>
                <tr>
                  <td><strong>results</strong></td>
                  <td>
                    <p>Information based on the selected zone.</p>
                    <table class="table table-bordered table-striped table-condensed">
                      <tbody><tr>
                        <td>zone</td>
                        <td>The location code based on prayer time zones provided by Jakim. <br>
	                    <strong>Input:</strong> Refer to <a href="{{ route('home.zones') }}">zone codes here</a>.</td>
                      </tr>
                      <tr>
                        <td>negeri</td>
                        <td>List of states within Malaysia.</td>
                      </tr>
                      <tr>
                        <td>lokasi</td>
                        <td>List of locations identified by Jakim for which having similar prayer timezone.</td>
                      </tr>
                      <tr>
                        <td>lat</td>
                        <td>Latitude information in geographic coordinate system.</td>
                      </tr>
                      <tr>
                        <td>lng</td>
                        <td>Longitude information in geographic coordinate system.</td>
                      </tr>
                    </tbody>
                  </table>

                  </td>
                </tr>
              </tbody>
            </table>
    </p>

    <h3>Exception Fields</h3>
    <p>
      <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 100px">Parameter</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>error_code</strong></td>
                  <td>
                  Return error code `400` for any error occured.
                  </td>
                </tr>
                <tr>
                  <td><strong>error_type</strong></td>
                  <td>
                    Error types either REQUIRED_FIELD, INVALID_ZONE, LIMIT_EXCEEDED or COMPLEX_ERROR
                  </td>
                </tr>
                <tr>
                  <td><strong>error_desc</strong></td>
                  <td>
                  <p>Show error description based on table below</p>
                    <table class="table table-bordered table-striped table-condensed">
                      <tbody><tr>
                        <td style="width:20%">REQUIRED_FIELD</td>
                        <td>Missing Required field.</td>
                      </tr>
                      <tr>
                        <td>INVALID_ZONE</td>
                        <td>Invalid zone code given.</td>
                      </tr>
                      <tr>
                        <td>LIMIT_EXCEEDED</td>
                        <td>Maximum limit of 365 queries exceeded.</td>
                      </tr>
                      <tr>
                        <td>COMPLEX_ERROR</td>
                        <td>Complex error has occured.</td>
                      </tr>
                    </tbody>
                  </table>
                  </td>
                </tr>
              </tbody>
            </table>
    </p>

		<h3>Example Request</h3>
		<p>
			<pre>{{ $url }}</pre>
		</p>

		<h3>Example Result</h3>
		<p>
			<pre>{{ $demo }}</pre>
		</p>

	</div>


</section>
@endsection
