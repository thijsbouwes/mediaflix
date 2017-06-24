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
    <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">Home</a></li>

    @if (Auth::check())
        <!--Dropdown trigger-->
        <li class="{{ Request::is('account') ? "active" : "" }}"><a class="dropdown-button" href="#!" data-activates="dropdownMoblie">{{ Auth::user()->name }}<i class="material-icons right">account_circle</i></a></li>
    @else
        <!--My Account-->
        <li class="{{ Request::is('login') ? "active" : "" }}"><a class="dropdown-button" href="#!" data-activates="dropdownMoblie">Account<i class="material-icons right">account_circle</i></a></li>
    @endif
</ul>

<!--Navbar-->
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <a href="/" class="brand-logo">{{ config('app.name', 'Skihut') }}</a>
            <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>

            <!--Desktop nav-->
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">Home</a></li>
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
    </nav>
</div>
