<aside class="bg-light lter b-r aside-lg hidden-print" id="nav">
	<section class="vbox">

		<section class="w-f scrollable">
			<div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">

				<!-- nav -->
				<nav class="nav-primary hidden-xs">
					<ul class="nav">

						<li class="@yield('reference')">
							<a href="#reference"  >
								<i class="fa fa-puzzle-piece icon">
									<b class="bg-primary"></b>
								</i>
								<span class="pull-right">
									<i class="fa fa-angle-down text"></i>
									<i class="fa fa-angle-up text-active"></i>
								</span>
								<span>API References</span>
							</a>
							<ul class="nav lt">
								<li class="@yield('times_today')">
									<a href="{{ route('ref.times.today') }}">
										<i class="fa fa-angle-right"></i>
										<span>GET times/today</span>
									</a>
								</li>
								<li class="@yield('times_tomorrow')">
									<a href="{{ route('ref.times.tomorrow') }}">
										<i class="fa fa-angle-right"></i>
										<span>GET times/tomorrow</span>
									</a>
								</li>
								<li class="@yield('times_this_week')">
									<a href="{{ route('ref.times.this_week') }}">
										<i class="fa fa-angle-right"></i>
										<span>GET times/this_week</span>
									</a>
								</li>
								<li class="@yield('times_this_month')">
									<a href="{{ route('ref.times.this_month') }}">
										<i class="fa fa-angle-right"></i>
										<span>GET times/this_month</span>
									</a>
								</li>

								<li class="@yield('times_date')">
									<a href="{{ route('ref.times.date') }}">
										<i class="fa fa-angle-right"></i>
										<span>GET times/date</span>
									</a>
								</li>

								<li class="@yield('times_month')">
									<a href="{{ route('ref.times.month') }}">
										<i class="fa fa-angle-right"></i>
										<span>GET times/month</span>
									</a>
								</li>

								<li class="@yield('zone_states')">
									<a href="{{ route('ref.zone.states') }}">
										<i class="fa fa-angle-right"></i>
										<span>GET zone/states</span>
									</a>
								</li>

								<li class="@yield('zone_zones')">
									<a href="{{ route('ref.zone.zones') }}">
										<i class="fa fa-angle-right"></i>
										<span>GET zone/zones</span>
									</a>
								</li>

								<li class="@yield('zone_grouped')">
									<a href="{{ route('ref.zone.grouped') }}">
										<i class="fa fa-angle-right"></i>
										<span>GET zone/grouped</span>
									</a>
								</li>
							</ul>
						</li>

						<li class="@yield('zones')">
							<a href="{{ route('home.zones') }}" class="@yield('zones')">
								<i class="fa fa-map-marker icon">
									<b class="bg-primary"></b>
								</i>
								<span>Location Codes</span>
							</a>
						</li>

						<li class="@yield('status')">
							<a href="{{ route('home.status') }}" class="@yield('status')">
								<i class="fa fa-tasks icon">
									<b class="bg-primary"></b>
								</i>
								<span>Data Health</span>
							</a>
						</li>

						<li class="@yield('disclaimer')">
							<a href="{{ action('HomeController@getDisclaimer') }}" class="@yield('disclaimer')">
								<i class="fa fa-warning icon">
									<b class="bg-primary"></b>
								</i>
								<span>Disclaimer</span>
							</a>
						</li>

					</ul>
				</nav>
				<!-- / nav -->
			</div>
		</section>

		<footer class="footer lt hidden-xs b-t">
			<div id="chat" class="dropup">
				<section class="dropdown-menu on aside-md m-l-n">
					<section class="panel bg-white">
						<header class="panel-heading b-b b-light">Active chats</header>
						<div class="panel-body animated fadeInRight">
							<p class="text-sm">No active chats.</p>
							<p><a href="#" class="btn btn-sm btn-default">Start a chat</a></p>
						</div>
					</section>
				</section>
			</div>
			<div id="invite" class="dropup">
				<section class="dropdown-menu on aside-md m-l-n">
					<section class="panel bg-white">
						<header class="panel-heading b-b b-light">
							John <i class="fa fa-circle text-success"></i>
						</header>
						<div class="panel-body animated fadeInRight">
							<p class="text-sm">No contacts in your lists.</p>
							<p><a href="#" class="btn btn-sm btn-facebook"><i class="fa fa-fw fa-facebook"></i> Invite from Facebook</a></p>
						</div>
					</section>
				</section>
			</div>
			<div class="btn-group hidden-nav-xs">
				<a href="https://github.com/kayrules/solatjakim-api-site" type="button" data-toggle="tooltip" data-placement="top" title="REST API at Github" class="btn btn-icon btn-sm btn-default"><i class="fa fa-github"></i></a>
				<a href="http://facebook.com/azanpro.mobile" type="button" data-toggle="tooltip" data-placement="top" title="Azan Pro Facebook Page" class="btn btn-icon btn-sm btn-default"><i class="fa fa-facebook"></i></a>
				<a href="http://bit.ly/azanpro" type="button" data-toggle="tooltip" data-placement="top" title="Azan Pro iOS App" class="btn btn-sm btn-default">Azan Pro iOS</a>


			</div>
		</footer>
	</section>
</aside>
