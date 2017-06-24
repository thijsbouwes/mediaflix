@extends('main')

@section('title', ' | Home')

@section('content')
    <div class="row" id="app">
        <div class="row beerpage">
            <div class="col s12">

                <!-- Info about refresh and beer -->
                <div class="row">
                    <div class="col l2 m4 offset-l1">
                        <div class="card">
                            <div class="card-content">
                                <p>Time</p>
                                <span class="card-title"> @{{ timerCurrentTime }} </span>
                            </div>
                        </div>
                    </div>

                    <div class="col l2">
                        <div class="card">
                            <div class="card-content">
                                <p>Tempreature</p>
                                <span class="card-title" id="temp">0 'C</span>
                            </div>
                        </div>
                    </div>          

                    <div class="col l2">
                        <div class="card">
                            <div class="card-content">
                                <p>Humidity</p>
                                <span class="card-title" id="humidity">0 %</span>
                            </div>
                        </div>
                    </div>
            
                    <div class="col l2">
                        <div class="card">
                            <div class="card-content">
                                <p>Liters beers</p>
                                <span class="card-title" id="litersBeers">50L</span>
                            </div>
                        </div>
                    </div>

                    <div class="col l2">
                        <div class="card">
                            <div class="card-content">
                                <p>Opened beers</p>
                                <span class="card-title" id="totalBeers">100</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col l6 offset-l3 center-align">
                        <blockquote id="quoteBeer">This is an example quotation that uses the blockquote tag.<br>Here is another line to make it look bigger.</blockquote>
                    </div>
                </div>

                <div class="row" id="beer">

                    <div id="beerTrending" class="col s12 l6">         
                        <!--Div that will hold the pie chart-->
                        <canvas id="lineChart" width="850px" height="550px"></canvas>
                    </div>

                    <div id="beerTrending" class="col s12 l6">  
                        <table class="striped" id="ground-table">
                            <thead>
                                <tr>
                                    <th data-field="id">Id</th>
                                    <th data-field="opened">Opened</th>
                                    <th data-field="ip">ip</th>
                                    <th data-field="time">Timestamp</th>
                                </tr>
                            </thead>
                            
                            <tbody id="ground-table">
                                    <tr v-for="beer in beers">
                                        <td>@{{ beer.id }}</td><td>@{{ beer.opened }}</td><td>@{{ beer.ip }}</td><td>@{{ beer.date }}</td>
                                    </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
@stop