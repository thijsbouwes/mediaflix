@extends('main')

@section('title', ' | Home')

@section('content')

    <section class="valign-wrapper || banner full-height image-1">
        <div class="row">
            <div class="col s12 center-align white-text">
                <h1 class="valign">
                    <span class="bold">{{ config('app.name', 'Skihut') }}</span>
                    <span class="thin"><br>The social connection</span>
                </h1>

                @auth
                    <a class="waves-effect waves-light btn-large" href="{{ route('dashboard') }}">Dashboard<i class="material-icons right">account_circle</i></a>
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
                        <p class="promo-caption">Versnelt ontwikkeling</p>
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
            <div class="parallax"><img src="images/code.jpg"></div>
        </div>
    </section>

    <section>
        <div class="container">
            <h1 class="center-align">FAQ</h1>
            <ul class="collapsible popout" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header"><i class="material-icons">filter_drama</i>First</div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
                <li class="active">
                    <div class="collapsible-header"><i class="material-icons">place</i>Second</div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
            </ul>
        </div>
    </section>
@stop

