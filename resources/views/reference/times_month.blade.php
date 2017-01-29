@section('title', 'Solat Jakim API (Unofficial)')
@section('reference', 'active')
@section('times_month', 'active')

@extends('layouts.default')

@section('content')
<section class="vbox">
	<header class="header">
		<h2>GET times/month</h2>
	</header>
	<div class="padder">
		<p>
			Returns prayer times based on custom month and year for a given zone.
		</p>

		<h3>Resource URL</h3>
		<p>
			<pre>{{ Helper::site_domain() . '/times/month.json' }}</pre>
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
                  <td><strong>zone</strong></td>
                  <td>Required</td>
                  <td>The location code based on prayer time zones provided by Jakim. <br>
                  <strong>Input:</strong> Refer to <a href="{{ route('home.zones') }}">zone codes here</a>.</td>
                </tr>
                <tr>
                  <td><strong>month</strong></td>
                  <td>Required</td>
                  <td>Month using numeric representation with or without leading zeros. 01 (January) through 12 (December).</td>
                </tr>
                <tr>
                  <td><strong>year</strong></td>
                  <td>Required</td>
                  <td>Year using ISO-8601 year number. Examples: 1999 or 2003.</td>
                </tr>
                <tr>
                  <td><strong>format</strong></td>
                  <td>Optional</td>
                  <td>
                    <p>Options for time formatting
                    <br><strong>Input:</strong> One of the values below.
                    <br><strong>Default:</strong> timestamp
                    </p>
                    <table class="table table-bordered table-striped table-condensed">
                      <tbody><tr>
                        <td>timestamp</td>
                        <td>Show results for prayer times in timestamp format.</td>
                      </tr>
                      <tr>
                        <td>12-hour</td>
                        <td>Show results for prayer times in 12-hour format.</td>
                      </tr>
                      <tr>
                        <td>24-hour</td>
                        <td>Show results for prayer times in 24-hour format.</td>
                      </tr>
                    </tbody></table>

                  </td>
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
                  <td><strong>zone</strong></td>
                  <td>
                  The location code based on prayer time zones provided by Jakim. Refer to <a href="{{ route('home.zones') }}">zone codes here</a>.
                  </td>
                </tr>
                <tr>
                  <td><strong>start</strong></td>
                  <td>
                    Start date in format `dd-mm-yyyy`.
                  </td>
                </tr>
                <tr>
                  <td><strong>end</strong></td>
                  <td>
                    End date in format `dd-mm-yyyy`.
                  </td>
                </tr>
                <tr>
                  <td><strong>locations</strong></td>
                  <td>
                    List of locations identified by Jakim for which having similar prayer timezone.
                  </td>
                </tr>
                <tr>
                  <td><strong>prayer_times</strong></td>
                  <td>
                    <p>prayer times information based on the selected zone.</p>
                    <table class="table table-bordered table-striped table-condensed">
                      <tbody><tr>
                        <td>date</td>
                        <td>Date in format `dd-mm-yyyy`.</td>
                      </tr>
                      <tr>
                        <td>datestamp</td>
                        <td>Date in unix timestamp (a.k.a. POSIX time or Epoch time) format.</td>
                      </tr>
                      <tr>
                        <td>imsak</td>
                        <td>The time period which in Malaysia is equal to 10 minutes before fajr timing.</td>
                      </tr>
                      <tr>
                        <td>subuh</td>
                        <td>The time period within which the Fajr daily prayer MUST be performed.</td>
                      </tr>
                      <tr>
                        <td>syuruk</td>
                        <td>The time period after the deadline of fajr prayer. It is forbidden to pray during this syuruk time.</td>
                      </tr>
                      <tr>
                        <td>zohor</td>
                        <td>The time period within which the Dhuhr daily prayer MUST be performed.</td>
                      </tr>
                      <tr>
                        <td>asar</td>
                        <td>The time period within which the Asr daily prayer MUST be performed.</td>
                      </tr>
                      <tr>
                        <td>maghrib</td>
                        <td>The time period within which the Maghrib daily prayer MUST be performed.</td>
                      </tr>
                      <tr>
                        <td>isyak</td>
                        <td>The time period within which the Isha daily prayer MUST be performed.</td>
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
			<pre class="json_wrap">{{ $demo }}</pre>
		</p>

	</div>


</section>
@endsection
