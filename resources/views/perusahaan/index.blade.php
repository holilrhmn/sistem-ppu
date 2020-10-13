@extends('layouts.app')

@section('content')
<h1>Pencarian Perusahaan</h1>

    <div class="form-inline">
    <div class="form-group">
        <label for="q" class="control-label">Cari data</label>
        <input placeholder="input nama perusahaan" name="q" type="text" id="q" class="form-control mx-sm-2">
    </div>
    <button class="btn btn-secondary" onclick="return submitCariBesarInvestasi()">Submit</button>
    <button class="btn btn-secondary" id="tes">Tes</button>
    </div>

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
    
    function submitCariBesarInvestasi(){
        var input = document.getElementById("q").value;
       // console.log(input);
        //var url = window.location;
        //console.log(input);
        var url = 'http://localhost:8000/cariBesarInvestasi/'+input;
        console.log(url);
       // axios.get('{{ route('cariBesarInvestasi', '+input') }}')
       axios.get(url)
        .then(function(response) {

            console.log(response.data);
            L.geoJSON(response.data, {
                    pointToLayer: function(geoJsonPoint, latlng) {
                        return L.marker(latlng);
                    }
                })
                .bindPopup(function(layer) {
                    //console.log(layer);
                    return layer.feature.properties.map_popup_content;
                }).addTo(map);
                console.log(document.getElementById("mapid").value);
        })
        .catch(function(error) {
            console.log(error);
        });

        
    }

    var tampMarker = {};
    var layerGroup = L.layerGroup();
    var geoJsonLayer = L.geoJSON().addTo(map);
    var polyLayer;
    $("#tes").click(function(){
        
        var url = 'http://localhost:8000/cariBesarInvestasi/'+$('#q').val();
        $.ajax(
            {
                url: url, 
                success: function(result){
                   // $(".leaflet-marker-icon").remove();
                    // $(".leaflet-popup").remove();
                    
                    
                    console.log(result);
                    // map.eachLayer(function (layer) {
                    //      //console.log(marker);
                    //      //map.removeLayer(marker);
                    //      layer.clearLayers(); 
                    // });
                    
                    //L.geoJSON(result).clearLayers();
                    
                    // L.geoJSON(result, {
                    // pointToLayer: function(geoJsonPoint, latlng) {
                    //     marker = L.marker(latlng);
                    //     return marker;
                    // }
                    // })
                    //  .bindPopup(function(layer) {
                    // //console.log(layer);
                    // return layer.feature.properties.map_popup_content;
                    //  }).addTo(map);
                    
                // //      L.geoJSON(result, {
                // //     pointToLayer: function(geoJsonPoint, latlng) {
                // //         //tamp = latlng;
                // //         L.marker(latlng).remove;
                // //         //map.removeLayer(latlng);
                // //         return L.marker(latlng);
                        
                // //         //return L.marker(latlng);
                // //     }, 

                // // })
                // // .bindPopup(function(layer) {
                // //     //console.log(layer);
                // //     return layer.feature.properties.map_popup_content;
                // // }).addTo(map);
                
                //geoJsonLayer.addData(result);
                
                    // console.log(L.marker());
                    if(polyLayer)
                            {
                                map.removeLayer(polyLayer); // remove the old polygon...
                            }
                            polyLayer = L.geoJson(result).addTo(map);
                                                
                 }
        });
     });

     $.ajax({
        dataType: "json",
        url: '{{ asset('js/mapKotaBalikpapan.geojson') }}',
        success: function(data) {
                L.geoJson(data, {
                    style: function(feature) {
                        console.log(feature.properties.name);
                            switch (feature.properties.name) {
                                case 'BalikpapanUtara': return {color: "#ff0000"};
                                case 'BalikpapanKota':   return {color: "#0000ff"};
                        }
                    }
                }).addTo(map);
        }
    });

    function onEachFeature(feature, layer) {

        var popupContent = "<table>";
         popupContent += "<tr><td colspan=3><img src={{ asset('images/imagesr.jpeg') }}></td></tr>";
         popupContent += "<tr><td>Nama Perusahaan</td><td>:</td><td>"+feature.properties.NAMA_PERUS+"</td></tr>";
         popupContent += "<tr><td>NIB</td><td>:</td><td>"+feature.properties.NIB+"</td></tr>";
         popupContent += "<tr><td>Alamat Perusahaan</td><td>:</td><td>"+feature.properties.ALAMAT_PER+"</td></tr>";
         popupContent += "<tr><td>Kode KBLI</td><td>:</td><td>"+feature.properties.KODE_KBLI+"</td></tr>";
         popupContent += "<tr><td>Kelurahan</td><td>:</td><td>"+feature.properties.KELURAHAN+"</td></tr>";
         popupContent += "<tr><td>Kecamatan</td><td>:</td><td>"+feature.properties.KECAMATAN+"</td></tr>";
         popupContent += "<tr><td>No Izin</td><td>:</td><td>"+feature.properties.NOMOR_IZIN+"</td></tr>";
         popupContent += "<tr><td>Tanggal Izin</td><td>:</td><td>"+feature.properties.TANGGAL_IZ+"</td></tr>";
        
         popupContent += "</tr></table>";

        layer.bindPopup(popupContent);
    }
</script>
@endpush