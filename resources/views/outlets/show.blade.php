@extends('layouts.app')

@section('title', __('outlet.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('outlet.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('outlet.nib') }}</td><td>{{ $outlet->nib }}</td></tr>
                        <tr><td>{{ __('outlet.name') }}</td><td>{{ $outlet->name }}</td></tr>
                        <tr><td>{{ __('outlet.address') }}</td><td>{{ $outlet->address }}</td></tr>
                        <tr><td>{{ __('outlet.nama_pendaftar') }}</td><td>{{ $outlet->nama_pendaftar }}</td></tr>
                        <tr><td>{{ __('outlet.telepon_pendaftar') }}</td><td>{{ $outlet->telepon_pendaftar }}</td></tr>
                        <tr><td>{{ __('outlet.email_pendaftar') }}</td><td>{{ $outlet->email_pendaftar }}</td></tr>
                        <tr><td>{{ __('outlet.nik') }}</td><td>{{ $outlet->nik }}</td></tr>
                        <tr><td>{{ __('outlet.propinsi') }}</td><td>{{ $outlet->propinsi }}</td></tr>
                        <tr><td>{{ __('outlet.kab_kota') }}</td><td>{{ $outlet->kab_kota }}</td></tr>
                        <tr><td>{{ __('outlet.kecamatan') }}</td><td>{{ $outlet->kecamatan }}</td></tr>
                        <tr><td>{{ __('outlet.kelurahan') }}</td><td>{{ $outlet->kelurahan }}</td></tr>
                        <tr><td>{{ __('outlet.jumlah_tki_l') }}</td><td>{{ $outlet->jumlah_tki_l }}</td></tr>
                        <tr><td>{{ __('outlet.jumlah_tki_p') }}</td><td>{{ $outlet->jumlah_tki_p }}</td></tr>
                        <tr><td>{{ __('outlet.kbli') }}</td><td>{{ $outlet->kbli }}</td></tr>
                        <tr><td>{{ __('outlet.bangunan') }}</td><td>{{ $outlet->bangunan }}</td></tr>
                        <tr><td>{{ __('outlet.mesin_peralatan') }}</td><td>{{ $outlet->mesin_peralatan }}</td></tr>
                        <tr><td>{{ __('outlet.peralatan_impor') }}</td><td>{{ $outlet->peralatan_impor }}</td></tr>
                        <tr><td>{{ __('outlet.pembelian_dan_pematangan_tanah') }}</td><td>{{ $outlet->pembelian_dan_pematangan_tanah }}</td></tr>
                        <tr><td>{{ __('outlet.investasi_lain_lain') }}</td><td>{{ $outlet->investasi_lain_lain }}</td></tr>
                        <tr><td>{{ __('outlet.pembelian_pematangan_lain_lain') }}</td><td>{{ $outlet->pembelian_pematangan_lain_lain }}</td></tr>
                        <tr><td>{{ __('outlet.modal_kerja_3_bulanan') }}</td><td>{{ $outlet->modal_kerja_3_bulanan }}</td></tr>
                        <tr><td>{{ __('outlet.jumlah_investasisin_p') }}</td><td>{{ $outlet->jumlah_investasisin_p }}</td></tr>
                        <tr><td>{{ __('outlet.tanggal_pengajuan_pemohonan_berusaha') }}</td><td>{{ $outlet->tanggal_pengajuan_pemohonan_berusaha }}</td></tr>
                        <tr><td>{{ __('outlet.tanggal_terbit_oss') }}</td><td>{{ $outlet->tanggal_terbit_oss }}</td></tr>
                        <tr><td>{{ __('outlet.jenis_perseroan') }}</td><td>{{ $outlet->jenis_perseroan }}</td></tr>
                        <tr><td>{{ __('outlet.status_penanaman_modal') }}</td><td>{{ $outlet->status_penanaman_modal }}</td></tr>
                        <tr><td>{{ __('outlet.nama_pemegang_saham') }}</td><td>{{ $outlet->nama_pemegang_saham }}</td></tr>
                        <tr><td>{{ __('outlet.total_modal') }}</td><td>{{ $outlet->total_modal }}</td></tr>
                        <tr><td>{{ __('outlet.jabatan') }}</td><td>{{ $outlet->jabatan }}</td></tr>
                        <tr><td>{{ __('outlet.negara_asal') }}</td><td>{{ $outlet->negara_asal }}</td></tr>
                        <tr><td>{{ __('outlet.penanggung_jawab') }}</td><td>{{ $outlet->penanggung_jawab }}</td></tr>
                        <tr><td>{{ __('outlet.latitude') }}</td><td>{{ $outlet->latitude }}</td></tr>
                        <tr><td>{{ __('outlet.longitude') }}</td><td>{{ $outlet->longitude }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $outlet)
                    <a href="{{ route('outlets.edit', $outlet) }}" id="edit-outlet-{{ $outlet->id }}" class="btn btn-warning">{{ __('outlet.edit') }}</a>
                @endcan
                @if(auth()->check())
                    <a href="{{ route('outlets.index') }}" class="btn btn-link">{{ __('outlet.back_to_index') }}</a>
                @else
                    <a href="{{ route('outlet_map.index') }}" class="btn btn-link">{{ __('outlet.back_to_index') }}</a>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ trans('outlet.location') }}</div>
            @if ($outlet->coordinate)
            <div class="card-body" id="mapid"></div>
            @else
            <div class="card-body">{{ __('outlet.no_coordinate') }}</div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>

<style>
    #mapid { height: 400px; }
</style>
@endsection
@push('scripts')
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
<script>
    var mapCenter = [{{ $outlet->latitude }}, {{ $outlet->longitude }}];
    var map = L.map('mapid').setView(mapCenter, {{ config('leaflet.detail_zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var marker = L.marker(mapCenter).addTo(map);
    function updateMarker(lat, lng) {
        marker
        .setLatLng([lat, lng])
        .bindPopup("Your location :  " + marker.getLatLng().toString())
        .openPopup();
        return false;
    };

    map.on('click', function(e) {
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);
        $('#latitude').val(latitude);
        $('#longitude').val(longitude);
        updateMarker(latitude, longitude);
    });

    var updateMarkerByInputs = function() {
        return updateMarker( $('#latitude').val() , $('#longitude').val());
    }
    $('#latitude').on('input', updateMarkerByInputs);
    $('#longitude').on('input', updateMarkerByInputs);
</script>
@endpush
