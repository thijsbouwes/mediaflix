@extends('main')

@section('title', ' | Home')

@section('content')

    <section class="valign-wrapper || banner full-height image-1">
        <div class="row">
            <div class="col s12 center-align white-text">
                <h1 class="valign">
                    <span class="bold">{{ config('app.name', 'Mediaflix') }}</span>
                    <span class="thin"><br>The best media streamer</span>
                </h1>

                @auth
                    <a class="waves-effect waves-light btn-large" href="{{ route('dashboard') }}">View media<i class="material-icons right">play_circle_filled</i></a>
                @endauth

                @guest
                    <a class="waves-effect waves-light btn-large" href="{{ route('login') }}">Login<i class="material-icons right">account_circle</i></a>
                @endguest

            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col s4">
                    <div class="center promo promo-example">
                        <i class="material-icons">flash_on</i>
                        <p class="promo-caption">Super snel</p>
                        <p class="light center">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components.</p>
                    </div>
                </div>
                <div class="col s4">
                    <div class="center promo promo-example">
                        <i class="material-icons">group</i>
                        <p class="promo-caption">Gericht op de gebruikerservaring</p>
                        <p class="light center">By utilizing elements and principles of Material Design, we were able to create a framework that focuses on User Experience.</p>
                    </div>
                </div>
                <div class="col s4">
                    <div class="center promo promo-example">
                        <i class="material-icons">settings</i>
                        <p class="promo-caption">Makkelijk om mee te werken</p>
                        <p class="light center">We have provided detailed documentation as well as specific code examples to help new users get started.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="parallax-container">
            <div class="parallax"><img src="/storage/images/movies.jpg"></div>
        </div>
    </section>

    <section>
        <div class="container">
            <h1 class="center-align">FAQ</h1>
            <ul class="collapsible popout" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header"><i class="material-icons">devices</i>Hoeveel apparaten?</div>
                    <div class="collapsible-body"><span>Per account kunnen er 3 apparaten worden gebruikt.</span></div>
                </li>
                <li class="active">
                    <div class="collapsible-header"><i class="material-icons">language</i>In wat voor taal is de media?</div>
                    <div class="collapsible-body"><span>De media wordt in verschillende talen aangeboden</span></div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">whatshot</i>New content?</div>
                    <div class="collapsible-body"><span>Wij proberen zoveel mogelijk content up to date te houden.</span></div>
                </li>
            </ul>
        </div>
    </section>
@stop

