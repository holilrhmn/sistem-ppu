@extends('layouts.app')

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

    //  var geojsonLayer = new L.GeoJSON.AJAX('{{ asset('js/Data_Lokasi_usaha.geojson') }}');       
    //  geojsonLayer.addTo(map);
     //console.log(geojsonLayer)

    // var data = $.ajax({
    //     dataType: "json",
    //     url: '{{ asset('js/Data_Lokasi_usaha.geojson') }}',
    //     success: function(data) {
    //             L.geoJson(data, {
    //                 onEachFeature: onEachFeature
    //             }).addTo(map);
    //     }
    // });

    // var poiLayers = L.layerGroup([
	// 	L.geoJson(perusahaan)
    // ]).addTo(map);
    
	// L.control.search({
	// 	layer: poiLayers,
	// 	initial: false,
    //     propertyName: 'NAMA_PERUS',
    //     zoom: 16,
	// 	buildTip: function(text, val) {
	// 		var type = val.layer.feature.properties.NAMA_PERUS;
	// 		return '<a href="#" class="'+type+'">'+text+' <b>'+type+'</b></a>';
	// 	}
	// })
	// .addTo(map);

    $.ajax({
        dataType: "json",
        url: '{{ asset('js/Kelurahan_Balikpapan.geojson') }}',
        success: function(data) {
                L.geoJson(data, {
                    onEachFeature: onEachFeature
                }).addTo(map);
        }
    });


    // function onEachFeature(feature, layer) {

    //     var popupContent = "<table>";
    //      popupContent += "<tr><td colspan=3><img src={{ asset('images/imagesr.jpeg') }}></td></tr>";
    //      popupContent += "<tr><td>Nama Perusahaan</td><td>:</td><td>"+feature.properties.NAMA_PERUS+"</td></tr>";
    //      popupContent += "<tr><td>NIB</td><td>:</td><td>"+feature.properties.NIB+"</td></tr>";
    //      popupContent += "<tr><td>Alamat Perusahaan</td><td>:</td><td>"+feature.properties.ALAMAT_PER+"</td></tr>";
    //      popupContent += "<tr><td>Kode KBLI</td><td>:</td><td>"+feature.properties.KODE_KBLI+"</td></tr>";
    //      popupContent += "<tr><td>Kelurahan</td><td>:</td><td>"+feature.properties.KELURAHAN+"</td></tr>";
    //      popupContent += "<tr><td>Kecamatan</td><td>:</td><td>"+feature.properties.KECAMATAN+"</td></tr>";
    //      popupContent += "<tr><td>No Izin</td><td>:</td><td>"+feature.properties.NOMOR_IZIN+"</td></tr>";
    //      popupContent += "<tr><td>Tanggal Izin</td><td>:</td><td>"+feature.properties.TANGGAL_IZ+"</td></tr>";
        
    //      popupContent += "</tr></table>";

    //     layer.bindPopup(popupContent);
    // }

    axios.get('{{ route('api.outlets.index') }}')
    .then(function (response) {
        console.log(response.data);
        L.geoJSON(response.data, {
            pointToLayer: function(geoJsonPoint, latlng) {
                return L.marker(latlng);
            }
        })
        .bindPopup(function (layer) {
            return layer.feature.properties.map_popup_content;
        }).addTo(map);
    })
    .catch(function (error) {
        console.log(error);
    });

    @can('create', new App\Outlet)
    var theMarker;

    map.on('click', function(e) {
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
