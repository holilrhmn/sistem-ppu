@extends('layouts.app')

@section('title', 'Peta TPS PPU')

@section('content')
<div class="card">
    <div class="card-body" id="mapid"></div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>

 <link rel="stylesheet" href="{{ asset('css/leaflet-search.css') }}" />
 <link rel="stylesheet" href="{{ asset('css/leaflet.extra-markers.min.css') }}">

<style>
    #mapid { min-height: 650px; }
</style>
@endsection
@push('scripts')
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"></script>
<script src="{{ asset('js/leaflet-search.js') }}"></script>
<script src="{{ asset('js/Data_Lokasi_usaha.geojson.js') }}"></script>
<script src="{{ asset('js/Armada1.geojson.js') }}"></script>
<script src="{{ asset('js/leaflet.extra-markers.min.js') }}"></script>

<script>
    var map = L.map('mapid').setView([{{ config('leaflet.map_center_latitude') }}, {{ config('leaflet.map_center_longitude') }}], {{ config('leaflet.zoom_level') }});
    var baseUrl = "{{ url('/') }}";

     L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);

    
    //Tampilkan semua data TPS
    $.ajax({
        url: '{{ route('api.tps.latitut') }}',
        success: function(result) {
            //console.log(result);
            L.geoJSON(result, {
                    pointToLayer: function(geoJsonPoint, latlng) {
                         switch (geoJsonPoint.properties.id_armada) {
                                case '1':
                                    var redMarker = L.ExtraMarkers.icon({
                                                //icon: 'fa-coffee',
                                                markerColor: 'green',
                                                shape: 'circle',
                                                //prefix: 'fa'
                                            });
                                    return L.marker(latlng, {icon: redMarker});
                                case '2':
                                    var redMarker = L.ExtraMarkers.icon({
                                                //icon: 'fa-coffee',
                                                markerColor: 'red',
                                                shape: 'circle',
                                                //prefix: 'fa'
                                            });
                                    return L.marker(latlng, {icon: redMarker});
                                case '3':
                                    var redMarker = L.ExtraMarkers.icon({
                                                //icon: 'fa-coffee',
                                                markerColor: 'black',
                                                shape: 'circle',
                                                //prefix: 'fa'
                                            });
                                    return L.marker(latlng, {icon: redMarker});
                                case '4':
                                    var redMarker = L.ExtraMarkers.icon({
                                                //icon: 'fa-coffee',
                                                markerColor: 'blue',
                                                shape: 'circle',
                                                //prefix: 'fa'
                                            });
                                    return L.marker(latlng, {icon: redMarker});
                                case '5':
                                    var redMarker = L.ExtraMarkers.icon({
                                                //icon: 'fa-coffee',
                                                markerColor: 'yellow',
                                                shape: 'circle',
                                                //prefix: 'fa'
                                            });
                                    return L.marker(latlng, {icon: redMarker});
                                case '6':
                                    var redMarker = L.ExtraMarkers.icon({
                                                //icon: 'fa-coffee',
                                                markerColor: 'orange',
                                                shape: 'circle',
                                                //prefix: 'fa'
                                            });
                                    return L.marker(latlng, {icon: redMarker});
                                case '7':
                                    var redMarker = L.ExtraMarkers.icon({
                                                //icon: 'fa-coffee',
                                                markerColor: 'violet',
                                                shape: 'circle',
                                                //prefix: 'fa'
                                            });
                                    return L.marker(latlng, {icon: redMarker});
                                case '8':
                                    var redMarker = L.ExtraMarkers.icon({
                                                //icon: 'fa-coffee',
                                                markerColor: 'purple',
                                                shape: 'circle',
                                                //prefix: 'fa'
                                            });
                                    return L.marker(latlng, {icon: redMarker});
                                case '9':
                                    var redMarker = L.ExtraMarkers.icon({
                                                //icon: 'fa-coffee',
                                                markerColor: 'blue-dark',
                                                shape: 'circle',
                                                //prefix: 'fa'
                                            });
                                    return L.marker(latlng, {icon: redMarker});
                                case '10':
                                    var redMarker = L.ExtraMarkers.icon({
                                                //icon: 'fa-coffee',
                                                markerColor: 'green-light',
                                                shape: 'circle',
                                                //prefix: 'fa'
                                            });
                                    return L.marker(latlng, {icon: redMarker});
                                case '11':
                                    var redMarker = L.ExtraMarkers.icon({
                                                //icon: 'fa-coffee',
                                                markerColor: 'green-dark',
                                                shape: 'circle',
                                                //prefix: 'fa'
                                            });
                                    return L.marker(latlng, {icon: redMarker});
                                case '12':
                                    var redMarker = L.ExtraMarkers.icon({
                                                //icon: 'fa-coffee',
                                                markerColor: 'cyan',
                                                shape: 'circle',
                                                //prefix: 'fa'
                                            });
                                    return L.marker(latlng, {icon: redMarker});
                                case '13':
                                    var redMarker = L.ExtraMarkers.icon({
                                                //icon: 'fa-coffee',
                                                markerColor: 'orange-dark',
                                                shape: 'circle',
                                                //prefix: 'fa'
                                            });
                                    return L.marker(latlng, {icon: redMarker});
                                case '14':
                                    var redMarker = L.ExtraMarkers.icon({
                                                //icon: 'fa-coffee',
                                                markerColor: 'orange-light',
                                                shape: 'circle',
                                                //prefix: 'fa'
                                            });
                                    return L.marker(latlng, {icon: redMarker});
                         }
                    }
                })
                .bindPopup(function(layer) {
                    console.log(layer);
                    return layer.feature.map_popup_content;
                }).addTo(map);
        }
    });
    //Rute Line Armada 1
    var Armada1 = {
        "color": "green",
        "weight": 5,
        "opacity": 0.65
    };
    $.ajax({
        dataType: "json",
        url: '{{ asset('js/Armada1.geojson') }}',
        success: function(data) {
            L.geoJson(data, {
                        style: Armada1
                    }).addTo(map);
        }
    });
    
    //Rute Line Armada 2
    var Armada2 = {
        "color": "red",
        "weight": 5,
        "opacity": 0.65
    };
    $.ajax({
        dataType: "json",
        url: '{{ asset('js/Armada2.geojson') }}',
        success: function(data) {
            L.geoJson(data, {
                        style: Armada2
                    }).addTo(map);
        }
    });
    
    //Rute Line Armada 3
    var Armada3 = {
        "color": "black",
        "weight": 5,
        "opacity": 0.65
    };
    $.ajax({
        dataType: "json",
        url: '{{ asset('js/Armada3.geojson') }}',
        success: function(data) {
            L.geoJson(data, {
                        style: Armada3
                    }).addTo(map);
        }
    });
    
    //Rute Line Armada 4
    var Armada4 = {
        "color": "blue",
        "weight": 5,
        "opacity": 0.65
    };
    $.ajax({
        dataType: "json",
        url: '{{ asset('js/Armada4.geojson') }}',
        success: function(data) {
            L.geoJson(data, {
                        style: Armada4
                    }).addTo(map);
        }
    });
    
    //Rute Line Armada 5
    var Armada5 = {
        "color": "yellow",
        "weight": 5,
        "opacity": 0.65
    };
    $.ajax({
        dataType: "json",
        url: '{{ asset('js/Armada5.geojson') }}',
        success: function(data) {
            L.geoJson(data, {
                        style: Armada5
                    }).addTo(map);
        }
    });
    
    //Rute Line Armada 6
    var Armada6 = {
        "color": "orange",
        "weight": 5,
        "opacity": 0.65
    };
    $.ajax({
        dataType: "json",
        url: '{{ asset('js/Armada6.geojson') }}',
        success: function(data) {
            L.geoJson(data, {
                        style: Armada6
                    }).addTo(map);
        }
    });
    
    //Rute Line Armada 7
    var Armada7 = {
        "color": "violet",
        "weight": 5,
        "opacity": 0.65
    };
    $.ajax({
        dataType: "json",
        url: '{{ asset('js/Armada7.geojson') }}',
        success: function(data) {
            L.geoJson(data, {
                        style: Armada7
                    }).addTo(map);
        }
    });
    
    //Rute Line Armada 8
    var Armada8 = {
        "color": "purple",
        "weight": 5,
        "opacity": 0.65
    };
    $.ajax({
        dataType: "json",
        url: '{{ asset('js/Armada8.geojson') }}',
        success: function(data) {
            L.geoJson(data, {
                        style: Armada8
                    }).addTo(map);
        }
    });
    
    //Rute Line Armada 9
    var Armada9 = {
        "color": "blue-dark",
        "weight": 5,
        "opacity": 0.65
    };
    $.ajax({
        dataType: "json",
        url: '{{ asset('js/Armada9.geojson') }}',
        success: function(data) {
            L.geoJson(data, {
                        style: Armada9
                    }).addTo(map);
        }
    });
    
    //Rute Line Armada 10
    var Armada10 = {
        "color": "green-light",
        "weight": 5,
        "opacity": 0.65
    };
    $.ajax({
        dataType: "json",
        url: '{{ asset('js/Armada10.geojson') }}',
        success: function(data) {
            L.geoJson(data, {
                        style: Armada10
                    }).addTo(map);
        }
    });
    
    //Rute Line Armada 11
    var Armada11 = {
        "color": "green-dark",
        "weight": 5,
        "opacity": 0.65
    };
    $.ajax({
        dataType: "json",
        url: '{{ asset('js/Armada11.geojson') }}',
        success: function(data) {
            L.geoJson(data, {
                        style: Armada11
                    }).addTo(map);
        }
    });
    
    //Rute Line Armada 12
    var Armada12 = {
        "color": "cyan",
        "weight": 5,
        "opacity": 0.65
    };
    $.ajax({
        dataType: "json",
        url: '{{ asset('js/Armada12.geojson') }}',
        success: function(data) {
            L.geoJson(data, {
                        style: Armada12
                    }).addTo(map);
        }
    });
    
    //Rute Line Armada 13
    var Armada13 = {
        "color": "orange-dark",
        "weight": 5,
        "opacity": 0.65
    };
    $.ajax({
        dataType: "json",
        url: '{{ asset('js/Armada13.geojson') }}',
        success: function(data) {
            L.geoJson(data, {
                        style: Armada13
                    }).addTo(map);
        }
    });
    
    //Rute Line Armada 14
    var Armada14 = {
        "color": "orange-light",
        "weight": 5,
        "opacity": 0.65
    };
    $.ajax({
        dataType: "json",
        url: '{{ asset('js/Armada14.geojson') }}',
        success: function(data) {
            L.geoJson(data, {
                        style: Armada14
                    }).addTo(map);
        }
    });

    function onEachFeature(feature, layer) {
        var popupContent = "Kecamatan: "+feature.properties.name;
        layer.bindPopup(popupContent);
    }

    @can('create', new App\Outlet)
    var theMarker;

    map.on('click', function(e) {
        //console.log("data the marker"+theMarker);
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);

        if (theMarker != undefined) {
            map.removeLayer(theMarker);
        };

        var popupContent = "Lokasi Anda : " + latitude + ", " + longitude + ".";
        popupContent += '<br><a href="{{ route('outlets.create') }}?latitude=' + latitude + '&longitude=' + longitude + '">Add Perseroan Baru</a>';

        theMarker = L.marker([latitude, longitude]).addTo(map);
        theMarker.bindPopup(popupContent)
        .openPopup();
    });
    @endcan

</script>
@endpush
