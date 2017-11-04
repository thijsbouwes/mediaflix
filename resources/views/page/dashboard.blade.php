@extends('main')

@section('title', ' | Dashboard')

@section('content')

    <div class="container center-align">
        <h2>Goodafternoon Thijs</h2>
    </div>

    <movie-list></movie-list>
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