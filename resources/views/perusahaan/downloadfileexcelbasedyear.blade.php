@extends('layouts.app')

@section('title', 'Download Data Per Tahun Via File Excel')

@section('content')
<div class="form-inline">
    <form method="GET" action="{{route('downloadFileExcelBasedOnYear')}}">
    <div class="form-group">
        <input placeholder="Input Kecamatan di Balikpapan" name="file" type="text" id="q" class="form-control mx-sm-2">
        <input type="submit" value="Download" class="btn btn-primary" >
    </div>
    </form>
</div>
</br>
<div class="card">
    <div class="card-body" id="mapid"></div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>

 <link rel="stylesheet" href="{{ asset('css/leaflet-search.css') }}" />

<style>
    #mapid { min-height: 500px; }
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

<script>
    var map = L.map('mapid').setView([{{ config('leaflet.map_center_latitude') }}, {{ config('leaflet.map_center_longitude') }}], {{ config('leaflet.zoom_level') }});
    var baseUrl = "{{ url('/') }}";

     L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);

        $.ajax(
            {
                url: '{{ route('api.outlets.index') }}', 
                success: function(result){
                    L.geoJSON(result, {
                        pointToLayer: function(geoJsonPoint, latlng) {
                            return L.marker(latlng);
                        }
                    })
                    .bindPopup(function (layer) {
                        return layer.feature.properties.map_popup_content;
                    }).addTo(map);
                }
            });


    @can('create', new App\Outlet)
    var theMarker;

    map.on('click', function(e) {
        //console.log("data the marker"+theMarker);
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);

        if (theMarker != undefined) {
            map.removeLayer(theMarker);
        };

        var popupContent = "Your location : " + latitude + ", " + longitude + ".";
        popupContent += '<br><a href="{{ route('outlets.create') }}?latitude=' + latitude + '&longitude=' + longitude + '">Add new outlet here</a>';

        theMarker = L.marker([latitude, longitude]).addTo(map);
        theMarker.bindPopup(popupContent)
        .openPopup();
    });
    @endcan

</script>
@endpush
