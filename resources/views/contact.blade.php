@extends('layouts.app')

@section('title', 'Контакты')

@section('content')
    <main class="container my-5">
        <div class="jumbotron">
            <h1 class="display-2">Где нас найти</h1>
            <hr class="my-4" />
            <h2 class="display-6">Наш офис расположен по адресу:</h2>
            <hr class="my-4" />
            <p class="lead">Дубрава кв-л 3 микрорайон, 3</p>
            <p class="lead">Старый Оскол, Белгородская обл., 309503</p>
            <p class="lead">Телефон: +7 999 519 39 33</p>
            <p class="lead">Электронная почта: khork@gmail.com</p>

            <div id="map" style="height: 400px;"></div>

            <script src='https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.js'></script>
            <link href='https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.css' rel='stylesheet' />
            <script>
                mapboxgl.accessToken = 'pk.eyJ1Ijoia2hvcmsiLCJhIjoiY2xnNGdhcWxnMG96dzNmbjlqbThwOTdxNSJ9.T07zXhJMeGxMu0tuWoh4Zw';
                const map = new mapboxgl.Map({
                    container: 'map', // container ID
                    style: 'mapbox://styles/mapbox/streets-v12', // style URL
                    center: [37.91418, 51.30917], // starting position [lng, lat]
                    zoom: 14 // starting zoom
                });

                const marker1 = new mapboxgl.Marker()
                    .setLngLat([37.91418, 51.30917])
                    .addTo(map);

                map.on('load', () => {
                    map.addLayer({
                        id: 'terrain-data',
                        type: 'line',
                        source: {
                            type: 'vector',
                            url: 'mapbox://mapbox.mapbox-terrain-v2'
                        },
                        'source-layer': 'contour'
                    });
                });
            </script>

        </div>
    </main>
@endsection
