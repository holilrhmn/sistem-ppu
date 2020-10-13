@extends('layouts.app')

@section('title', 'Pencarian Data Berdasarkan Kecamatan')

@section('content')
<div class="form-inline">
    <div class="form-group">
        <input placeholder="Input Jenis Usaha" name="q" type="text" id="q" class="form-control mx-sm-2">
    </div>
    <button class="btn btn-primary" id="cari">Cari</button>
</div>
</br>

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

    var polyLayer;
    $("#cari").click(function() {

        var url = 'http://localhost:8000/cariBerdasarkanJenisUsaha/' + $('#q').val();
        $.ajax({
            url: url,
            success: function(result) {
                //console.log(result);
                if(result.features.length == 0){
                    alert("Data tidak ditemukan")
                }else{
                    if (polyLayer) {
                        map.removeLayer(polyLayer); 
                    }
                    polyLayer = L.geoJson(result).bindPopup(function (layer) {
                        return layer.feature.properties.map_popup_content;
                    }).addTo(map);
                }

            },
            error:function(e){
                console.log(e);
            }
        });
    });

    $.ajax({
        dataType: "json",
        url: '{{ asset('js/mapKotaBalikpapan.geojson') }}',
        success: function(data) {
            L.geoJson(data, {
                style: function(feature) {
                    switch (feature.properties.name) {
                        case 'Balikpapan Utara':
                            return {
                                color: "#ff0000"
                            };
                        case 'Balikpapan Kota':
                            return {
                                color: "#0000ff"
                            };
                        case 'Balikpapan Selatan':
                            return {
                                color: "#FF0055"
                            };
                        case 'Balikpapan Timur':
                            return {
                                color: "#2AFF00"
                            };
                        case 'Balikpapan Barat':
                            return {
                                color: "#FF7F2A"
                            };
                        case 'Balikpapan Tengah':
                            return {
                                color: "#FF2AAA"
                            };
                    }
                }, 
                onEachFeature: onEachFeature
            }).addTo(map);
        }
    });

    function onEachFeature(feature, layer) {
        var popupContent = "Kecamatan: "+feature.properties.name;
        layer.bindPopup(popupContent);
    }
</script>
@endpush