@extends('main')

@section('title', ' | Dashboard')

@section('content')

    <div class="container center-align">
        <h2>Goodafternoon Thijs</h2>
    </div>

    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s3"><a class="active" href="#popular">Popular</a></li>
                <li class="tab col s3"><a href="#upcoming">Upcoming</a></li>
                <li class="tab col s3"><a href="#top_rated">Top rated</a></li>
                <li class="tab col s3"><a href="#recommendations">Recommendations</a></li>
            </ul>
        </div>
        <div id="popular" class="col s12">
            <movie-list type="popular"></movie-list>
        </div>
        <div id="upcoming" class="col s12">
            <movie-list type="upcoming"></movie-list>
        </div>
        <div id="top_rated" class="col s12">
            <movie-list type="top_rated"></movie-list>
        </div>
        <div id="recommendations" class="col s12">
            <p class="center-align">Show recommedations bassed on the previous seen videos</p>
        </div>
    </div>

    <movie-modal></movie-modal>

    <div id="watch" class="modal">
        <div class="modal-content">
            <h4>Example video</h4>
            <video id="video-example" width="100%" height="400" controls>
                <source src="http://distribution.bbb3d.renderfarming.net/video/mp4/bbb_sunflower_1080p_60fps_normal.mp4" type="video/mp4">
            </video>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>
@stop