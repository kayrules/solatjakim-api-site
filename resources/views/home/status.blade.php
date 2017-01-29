@section('title', 'Solat Jakim API (Unofficial)')
@section('status', 'active')

@extends('layouts.default')

@section('content')
<section class="vbox">
	<header class="header">
		<h2>Data Availibility Status - Year: {{ date('Y') }}</h2>
    <div class="text-muted">Last crawler update was at {{ $last_update }}</div>
	</header>
	<div class="padder">

    @foreach($states as $state)
		<h3>{{ $state }}</h3>
		<p>
			<table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th style="width:20%">Code</th>
              @foreach($months as $k => $month)
              <th class="text-center">{{ $month }}</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
          @foreach($results[$state] as $result)
            <tr>
              <td>{{ $result['zone'] }}</td>
              @foreach($months as $k => $month)
              	@if($status[$result['zone']][$k+1])
              	<td class="text-center"><i class="fa fa-check text-primary"></i></td>
              	@else
              	<td class="text-center"><i class="fa fa-times text-danger"></i></td>
              	@endif
              @endforeach
            </tr>
          @endforeach
          </tbody>
      </table>
		</p>
    @endforeach
	</div>
</section>
@endsection
