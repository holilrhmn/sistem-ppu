@extends('layouts.app')

@section('title', __('outlet.create'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('outlet.create') }}</div>
            <form method="POST" action="{{ route('outlets.store') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="nib" class="control-label">{{ __('outlet.nib') }}</label>
                        <input id="nib" type="text" class="form-control{{ $errors->has('nib') ? ' is-invalid' : '' }}" name="nib" value="{{ old('nib') }}" required>
                        {!! $errors->first('nib', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label">{{ __('outlet.name') }}</label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="address" class="control-label">{{ __('outlet.address') }}</label>
                        <textarea id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" rows="4">{{ old('address') }}</textarea>
                        {!! $errors->first('address', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="nama_pendaftar" class="control-label">{{ __('outlet.nama_pendaftar') }}</label>
                        <input id="nama_pendaftar" type="text" class="form-control{{ $errors->has('nama_pendaftar') ? ' is-invalid' : '' }}" name="nama_pendaftar" value="{{ old('nama_pendaftar') }}" required>
                        {!! $errors->first('nama_pendaftar', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="telepon_pendaftar" class="control-label">{{ __('outlet.telepon_pendaftar') }}</label>
                        <input id="telepon_pendaftar" type="text" class="form-control{{ $errors->has('telepon_pendaftar') ? ' is-invalid' : '' }}" name="telepon_pendaftar" value="{{ old('telepon_pendaftar') }}" required>
                        {!! $errors->first('telepon_pendaftar', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="email_pendaftar" class="control-label">{{ __('outlet.email_pendaftar') }}</label>
                        <input id="email_pendaftar" type="text" class="form-control{{ $errors->has('email_pendaftar') ? ' is-invalid' : '' }}" name="email_pendaftar" value="{{ old('email_pendaftar') }}" required>
                        {!! $errors->first('email_pendaftar', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="nik" class="control-label">{{ __('outlet.nik') }}</label>
                        <input id="nik" type="number" class="form-control{{ $errors->has('nik') ? ' is-invalid' : '' }}" name="nik" value="{{ old('nik') }}" required>
                        {!! $errors->first('nik', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="propinsi" class="control-label">{{ __('outlet.propinsi') }}</label>
                        <input id="propinsi" type="text" class="form-control{{ $errors->has('propinsi') ? ' is-invalid' : '' }}" name="propinsi" value="{{ old('propinsi') }}" required>
                        {!! $errors->first('propinsi', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="kab_kota" class="control-label">{{ __('outlet.kab_kota') }}</label>
                        <input id="kab_kota" type="text" class="form-control{{ $errors->has('kab_kota') ? ' is-invalid' : '' }}" name="kab_kota" value="{{ old('kab_kota') }}" required>
                        {!! $errors->first('kab_kota', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="kecamatan" class="control-label">{{ __('outlet.kecamatan') }}</label>
                        <input id="kecamatan" type="text" class="form-control{{ $errors->has('kecamatan') ? ' is-invalid' : '' }}" name="kecamatan" value="{{ old('kecamatan') }}" required>
                        {!! $errors->first('kecamatan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="kelurahan" class="control-label">{{ __('outlet.kelurahan') }}</label>
                        <input id="kelurahan" type="text" class="form-control{{ $errors->has('kelurahan') ? ' is-invalid' : '' }}" name="kelurahan" value="{{ old('kelurahan') }}" required>
                        {!! $errors->first('kelurahan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="jumlah_tki_l" class="control-label">{{ __('outlet.jumlah_tki_l') }}</label>
                        <input id="jumlah_tki_l" type="number" class="form-control{{ $errors->has('jumlah_tki_l') ? ' is-invalid' : '' }}" name="jumlah_tki_l" value="{{ old('jumlah_tki_l') }}" required>
                        {!! $errors->first('jumlah_tki_l', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="jumlah_tki_p" class="control-label">{{ __('outlet.jumlah_tki_p') }}</label>
                        <input id="jumlah_tki_p" type="number" class="form-control{{ $errors->has('jumlah_tki_p') ? ' is-invalid' : '' }}" name="jumlah_tki_p" value="{{ old('jumlah_tki_p') }}" required>
                        {!! $errors->first('jumlah_tki_p', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="kbli" class="control-label">{{ __('outlet.kbli') }}</label>
                        <input id="kbli" type="text" class="form-control{{ $errors->has('kbli') ? ' is-invalid' : '' }}" name="kbli" value="{{ old('kbli') }}" required>
                        {!! $errors->first('kbli', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="bangunan" class="control-label">{{ __('outlet.bangunan') }}</label>
                        <input id="bangunan" type="text" class="form-control{{ $errors->has('bangunan') ? ' is-invalid' : '' }}" name="bangunan" value="{{ old('bangunan') }}" required>
                        {!! $errors->first('bangunan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="mesin_peralatan" class="control-label">{{ __('outlet.mesin_peralatan') }}</label>
                        <input id="mesin_peralatan" type="text" class="form-control{{ $errors->has('mesin_peralatan') ? ' is-invalid' : '' }}" name="mesin_peralatan" value="{{ old('mesin_peralatan') }}" required>
                        {!! $errors->first('mesin_peralatan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="peralatan_impor" class="control-label">{{ __('outlet.peralatan_impor') }}</label>
                        <input id="peralatan_impor" type="text" class="form-control{{ $errors->has('peralatan_impor') ? ' is-invalid' : '' }}" name="peralatan_impor" value="{{ old('peralatan_impor') }}" required>
                        {!! $errors->first('peralatan_impor', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="pembelian_dan_pematangan_tanah" class="control-label">{{ __('outlet.pembelian_dan_pematangan_tanah') }}</label>
                        <input id="pembelian_dan_pematangan_tanah" type="text" class="form-control{{ $errors->has('pembelian_dan_pematangan_tanah') ? ' is-invalid' : '' }}" name="pembelian_dan_pematangan_tanah" value="{{ old('pembelian_dan_pematangan_tanah') }}" required>
                        {!! $errors->first('pembelian_dan_pematangan_tanah', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="investasi_lain_lain" class="control-label">{{ __('outlet.investasi_lain_lain') }}</label>
                        <input id="investasi_lain_lain" type="text" class="form-control{{ $errors->has('investasi_lain_lain') ? ' is-invalid' : '' }}" name="investasi_lain_lain" value="{{ old('investasi_lain_lain') }}" required>
                        {!! $errors->first('investasi_lain_lain', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="pembelian_pematangan_lain_lain" class="control-label">{{ __('outlet.pembelian_pematangan_lain_lain') }}</label>
                        <input id="pembelian_pematangan_lain_lain" type="text" class="form-control{{ $errors->has('pembelian_pematangan_lain_lain') ? ' is-invalid' : '' }}" name="pembelian_pematangan_lain_lain" value="{{ old('pembelian_pematangan_lain_lain') }}" required>
                        {!! $errors->first('pembelian_pematangan_lain_lain', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="modal_kerja_3_bulanan" class="control-label">{{ __('outlet.modal_kerja_3_bulanan') }}</label>
                        <input id="modal_kerja_3_bulanan" type="text" class="form-control{{ $errors->has('modal_kerja_3_bulanan') ? ' is-invalid' : '' }}" name="modal_kerja_3_bulanan" value="{{ old('modal_kerja_3_bulanan') }}" required>
                        {!! $errors->first('modal_kerja_3_bulanan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="jumlah_investasisin_p" class="control-label">{{ __('outlet.jumlah_investasisin_p') }}</label>
                        <input id="jumlah_investasisin_p" type="text" class="form-control{{ $errors->has('jumlah_investasisin_p') ? ' is-invalid' : '' }}" name="jumlah_investasisin_p" value="{{ old('jumlah_investasisin_p') }}" required>
                        {!! $errors->first('jumlah_investasisin_p', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pengajuan_pemohonan_berusaha" class="control-label">{{ __('outlet.tanggal_pengajuan_pemohonan_berusaha') }}</label>
                        <input id="tanggal_pengajuan_pemohonan_berusaha" type="text" class="form-control{{ $errors->has('tanggal_pengajuan_pemohonan_berusaha') ? ' is-invalid' : '' }}" name="tanggal_pengajuan_pemohonan_berusaha" value="{{ old('tanggal_pengajuan_pemohonan_berusaha') }}" required>
                        {!! $errors->first('tanggal_pengajuan_pemohonan_berusaha', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="tanggal_terbit_oss" class="control-label">{{ __('outlet.tanggal_terbit_oss') }}</label>
                        <input id="tanggal_terbit_oss" type="text" class="form-control{{ $errors->has('tanggal_terbit_oss') ? ' is-invalid' : '' }}" name="tanggal_terbit_oss" value="{{ old('tanggal_terbit_oss') }}" required>
                        {!! $errors->first('tanggal_terbit_oss', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="jenis_perseroan" class="control-label">{{ __('outlet.jenis_perseroan') }}</label>
                        <input id="jenis_perseroan" type="text" class="form-control{{ $errors->has('jenis_perseroan') ? ' is-invalid' : '' }}" name="jenis_perseroan" value="{{ old('jenis_perseroan') }}" required>
                        {!! $errors->first('jenis_perseroan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="status_penanaman_modal" class="control-label">{{ __('outlet.status_penanaman_modal') }}</label>
                        <input id="status_penanaman_modal" type="text" class="form-control{{ $errors->has('status_penanaman_modal') ? ' is-invalid' : '' }}" name="status_penanaman_modal" value="{{ old('status_penanaman_modal') }}" required>
                        {!! $errors->first('status_penanaman_modal', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="nama_pemegang_saham" class="control-label">{{ __('outlet.nama_pemegang_saham') }}</label>
                        <input id="nama_pemegang_saham" type="text" class="form-control{{ $errors->has('nama_pemegang_saham') ? ' is-invalid' : '' }}" name="nama_pemegang_saham" value="{{ old('nama_pemegang_saham') }}" required>
                        {!! $errors->first('nama_pemegang_saham', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="total_modal" class="control-label">{{ __('outlet.total_modal') }}</label>
                        <input id="total_modal" type="text" class="form-control{{ $errors->has('total_modal') ? ' is-invalid' : '' }}" name="total_modal" value="{{ old('total_modal') }}" required>
                        {!! $errors->first('total_modal', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="jabatan" class="control-label">{{ __('outlet.jabatan') }}</label>
                        <input id="jabatan" type="text" class="form-control{{ $errors->has('jabatan') ? ' is-invalid' : '' }}" name="jabatan" value="{{ old('jabatan') }}" required>
                        {!! $errors->first('jabatan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="negara_asal" class="control-label">{{ __('outlet.negara_asal') }}</label>
                        <input id="negara_asal" type="text" class="form-control{{ $errors->has('negara_asal') ? ' is-invalid' : '' }}" name="negara_asal" value="{{ old('negara_asal') }}" required>
                        {!! $errors->first('negara_asal', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="penanggung_jawab" class="control-label">{{ __('outlet.penanggung_jawab') }}</label>
                        <input id="penanggung_jawab" type="text" class="form-control{{ $errors->has('penanggung_jawab') ? ' is-invalid' : '' }}" name="penanggung_jawab" value="{{ old('penanggung_jawab') }}" required>
                        {!! $errors->first('penanggung_jawab', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="latitude" class="control-label">{{ __('outlet.latitude') }}</label>
                                <input id="latitude" type="text" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" name="latitude" value="{{ old('latitude', request('latitude')) }}" required>
                                {!! $errors->first('latitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="longitude" class="control-label">{{ __('outlet.longitude') }}</label>
                                <input id="longitude" type="text" class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" name="longitude" value="{{ old('longitude', request('longitude')) }}" required>
                                {!! $errors->first('longitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <div id="mapid"></div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('outlet.create') }}" class="btn btn-success">
                    <a href="{{ route('outlets.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>

<style>
    #mapid { height: 300px; }
</style>
@endsection

@push('scripts')
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
<script>
    var mapCenter = [{{ request('latitude', config('leaflet.map_center_latitude')) }}, {{ request('longitude', config('leaflet.map_center_longitude')) }}];
    var map = L.map('mapid').setView(mapCenter, {{ config('leaflet.zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var marker = L.marker(mapCenter).addTo(map);
    function updateMarker(lat, lng) {
        marker
        .setLatLng([lat, lng])
        .bindPopup("Lokasi Perseroan :  " + marker.getLatLng().toString())
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
