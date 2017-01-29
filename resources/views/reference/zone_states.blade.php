@section('title', 'Solat Jakim API (Unofficial)')
@section('reference', 'active')
@section('zone_states', 'active')

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
			<pre>{{ Helper::site_domain() . '/zone/states.json' }}</pre>
		</p>

		<h3>Parameters</h3>
		<p>
			No parameters needed.
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
							List all states within Malaysia.
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
