<!DOCTYPE html>
<html lang="en" class="app">
<head>
  <meta charset="utf-8" />
  <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
  <meta name="keywords" content="...">
  <meta name="description" content="...">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!--general styles  -->
  <link href="{{ elixir('css/core.css') }}" rel="stylesheet">
  <link href="{{ elixir('css/common.css') }}" rel="stylesheet">
  <!--custom styles -->
  @yield('custom-styles')
  <!-- general scripts -->
  <script src="{{ elixir('js/core.js') }}"></script>
  <!--[if lt IE 9]>
    <script src="{{ elixir('js/ie.js') }}"></script>
  <![endif]-->
</head>
<body>
<section class="vbox">
  @include('partials.header')
  <section>
	<section class="hbox stretch">
	@include('partials.menu')
	  <section id="content" class="bg-white">
		<section class="vbox">
		  <section class="scrollable padder">
			<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
			  <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
			  @if(Helper::breadcrumb(2) != false)<li class="active">{{ Helper::breadcrumb(2) }}</li>@endif
			  @if(Helper::breadcrumb(3) != false)<li class="active">{{ Helper::breadcrumb(3) }}</li>@endif
			  @if(Helper::breadcrumb(4) != false)<li class="active">{{ Helper::breadcrumb(4) }}</li>@endif
			</ul>
			@yield('content')
		  </section>
		</section>
		<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
	  </section>
	  <aside class="bg-light lter b-l aside-md hide" id="notes">
		<div class="wrapper">Notification</div>
	  </aside>
	</section>
  </section>
</section>
@yield('custom-scripts')
</body>
</html>
