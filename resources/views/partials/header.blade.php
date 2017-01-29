<header class="bg-primary dk header navbar navbar-fixed-top-xs">
      <div class="navbar-header">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="fa fa-bars"></i>
        </a>
        <a href="{{ route('home') }}" class="navbar-brand"><img src="{{ asset('img/render-1.png') }}" class="m-r-sm">@yield('title')</a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
</header>
