@extends('layouts.app')

@section('title', 'Pencarian Data Berdasarkan NIB')

@section('content')
<div class="card">
    <div class="card-body" id="mapid"></div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />

<link rel="stylesheet" href="{{ asset('css/leaflet-search.css') }}" />

<style>
    #mapid {
        min-height: 500px;
    }
</style>
@endsection
@push('scripts')
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"></script>
<script src="{{ asset('js/leaflet-search.js') }}"></script>
<script src="{{ asset('js/Data_Lokasi_usaha.geojson.js') }}"></script>

<script>
    var map = L.map('mapid').setView([{{ config('leaflet.map_center_latitude') }}, {{ config('leaflet.map_center_longitude') }}], {{ config('leaflet.zoom_level') }});
    var baseUrl = "{{ url('/') }}";

     L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);
    
    //Pencarian berdasarkan NIB
    $.ajax({
        url: '{{ route('api.outlets.index') }}',
        success: function(result) {
            //console.log(result);

            var poiLayers = L.layerGroup([
                L.geoJson(result)
            ]).addTo(map);

            L.control.search({
                layer: poiLayers,
                initial: false,
                propertyName: 'nib',
                zoom: 16,
                buildTip: function(text, val) {
                    var type = val.layer.feature.properties.name;
                    return '<a href="#" class="' + type + '">' + text + ' <b>' + type + '</b></a>';
                }
            })
            .addTo(map);
        }
    });
    //Akhir pencarian berdasarkan NIB

    //Tampilkan semua data
    $.ajax({
        url: '{{ route('api.outlets.index') }}',
        success: function(result) {
            //console.log(result);
            L.geoJSON(result, {
                    pointToLayer: function(geoJsonPoint, latlng) {
                        return L.marker(latlng);
                    }
                })
                .bindPopup(function(layer) {
                    //console.log(layer);
                    return layer.feature.properties.map_popup_content;
                }).addTo(map);
        }
    });
</script>
@endpush