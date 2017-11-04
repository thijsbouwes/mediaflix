@if (Auth::check())
    <!--Dropdown off nav-->
    <ul id="dropdown" class="dropdown-content">
        <li><a href="{{ url('account') }}">{{ Auth::user()->name }}</a></li>
        <li><a href="{{ url('logout') }}">Logout</a></li>
    </ul>
    <ul id="dropdownMoblie" class="dropdown-content">
        <li><a href="{{ url('account') }}">{{ Auth::user()->name }}</a></li>
        <li><a href="{{ url('logout') }}">Logout</a></li>
    </ul>
@else
    <!--Dropdown off nav-->
    <ul id="dropdown" class="dropdown-content">
        <li><a href="{{ url('login') }}">Login</a></li>
        <li><a href="{{ url('register') }}">Register</a></li>
    </ul>
    <ul id="dropdownMoblie" class="dropdown-content">
        <li><a href="{{ url('login') }}">Login</a></li>
        <li><a href="{{ url('register') }}">Register</a></li>
    </ul>
@endif()

<!--Mobile nav-->
<ul class="side-nav" id="mobile-menu">
    @if (Auth::check())
        <li class="{{ Request::is('events') ? "active" : "" }}"><a href="/dashboard#movies"><i class="material-icons right">local_movies</i>Movies</a></li>
    @endif

    @if (Auth::check())
        <!--Dropdown trigger-->
        <li class="{{ Request::is('account') ? "active" : "" }}"><a class="dropdown-button" href="#!" data-activates="dropdownMoblie">{{ Auth::user()->name }}<i class="material-icons right">account_circle</i></a></li>
    @else
        <!--My Account-->
        <li class="{{ Request::is('login') ? "active" : "" }}"><a class="dropdown-button" href="#!" data-activates="dropdownMoblie">Account<i class="material-icons right">account_circle</i></a></li>
    @endif
</ul>

<!--Navbar-->
<div class="row nav">
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="/" class="brand-logo">{{ config('app.name', 'Skihut') }}</a>
                    <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>

                    <!--Desktop nav-->
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        @if (Auth::check())
                            <li class="{{ Request::is('events') ? "active" : "" }}"><a href="/dashboard#movies"><i class="material-icons right">local_movies</i>Movies</a></li>
                        @endif

                        @if (Auth::check())
                        <!--Dropdown trigger-->
                            <li class="{{ Request::is('account') ? "active" : "" }}"><a class="dropdown-button" href="#!" data-activates="dropdown">{{ Auth::user()->name }}<i class="material-icons right">account_circle</i></a></li>
                        @else
                        <!--My Account-->
                            <li class="{{ Request::is('login') ? "active" : "" }}"><a class="dropdown-button" href="#!" data-activates="dropdown">Account<i class="material-icons right">account_circle</i></a></li>
                        @endif
                        <li><a href="#" id="enterFullScreen"><i class="material-icons">view_module</i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
