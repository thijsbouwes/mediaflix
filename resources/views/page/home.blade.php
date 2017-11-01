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

                <a class="waves-effect waves-light btn-large" href="{{ route('login') }}">Login<i class="material-icons right">account_circle</i></a>
            </div>
        </div>
    </section>
@stop