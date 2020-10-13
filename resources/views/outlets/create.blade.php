@extends('layouts.app')

@section('title', 'Input Sekolah')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
            <div class="card">
            <form method="POST" action="{{ route('outlets.store') }}" enctype="multipart/form-data" accept-charset="UTF-8">
                {{ csrf_field() }}
                
                <div class="card-body">
                    <!--
                    <div class="form-group">
                        <label for="nib" class="label-required">{{ __('outlet.nib') }}</label>
                        <input id="nib" type="text" class="form-control{{ $errors->has('nib') ? ' is-invalid' : '' }}" name="nib" value="{{ old('nib') }}" >
                        {!! $errors->first('nib', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    -->
                    <div class="form-group">
                        <label for="name" class="label-required">{{ __('outlet.name') }}</label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" >
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="address" class="label-required">{{ __('outlet.address') }}</label>
                        <textarea id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" rows="4">{{ old('address') }}</textarea>
                        {!! $errors->first('address', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="nama_pendaftar" class="label-required">{{ __('outlet.nama_pendaftar') }}</label>
                        <input id="nama_pendaftar" type="text" class="form-control{{ $errors->has('nama_pendaftar') ? ' is-invalid' : '' }}" name="nama_pendaftar" value="{{ old('nama_pendaftar') }}" >
                        {!! $errors->first('nama_pendaftar', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="telepon_pendaftar" class="label-required">{{ __('outlet.telepon_pendaftar') }}</label>
                        <input id="telepon_pendaftar" type="text" class="form-control{{ $errors->has('telepon_pendaftar') ? ' is-invalid' : '' }}" name="telepon_pendaftar" value="{{ old('telepon_pendaftar') }}" >
                        {!! $errors->first('telepon_pendaftar', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="email_pendaftar" class="label-required">{{ __('outlet.email_pendaftar') }}</label>
                        <input id="email_pendaftar" type="text" class="form-control{{ $errors->has('email_pendaftar') ? ' is-invalid' : '' }}" name="email_pendaftar" value="{{ old('email_pendaftar') }}" >
                        {!! $errors->first('email_pendaftar', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <!--
                    <div class="form-group">
                        <label for="kelurahan" class="label-required">{{ __('outlet.kelurahan') }}</label>
                        <select class="form-control" name="kelurahan" id="kelurahan">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_tki_l" class="control-label">{{ __('outlet.jumlah_tki_l') }}</label>
                        <input id="jumlah_tki_l" type="number" class="form-control{{ $errors->has('jumlah_tki_l') ? ' is-invalid' : '' }}" name="jumlah_tki_l" value="{{ old('jumlah_tki_l') }}" >
                        {!! $errors->first('jumlah_tki_l', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="jumlah_tki_p" class="control-label">{{ __('outlet.jumlah_tki_p') }}</label>
                        <input id="jumlah_tki_p" type="number" class="form-control{{ $errors->has('jumlah_tki_p') ? ' is-invalid' : '' }}" name="jumlah_tki_p" value="{{ old('jumlah_tki_p') }}" >
                        {!! $errors->first('jumlah_tki_p', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="jumlah_investasisin_p" class="control-label">{{ __('outlet.jumlah_investasisin_p') }}</label>
                        <input id="jumlah_investasisin_p" type="number" class="form-control{{ $errors->has('jumlah_investasisin_p') ? ' is-invalid' : '' }}" name="jumlah_investasisin_p" value="{{ old('jumlah_investasisin_p') }}" >
                        {!! $errors->first('jumlah_investasisin_p', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pengajuan_pemohonan_berusaha" class="control-label">{{ __('outlet.tanggal_pengajuan_pemohonan_berusaha') }}</label>
                        <input id="tanggal_pengajuan_pemohonan_berusaha" type="date" class="form-control{{ $errors->has('tanggal_pengajuan_pemohonan_berusaha') ? ' is-invalid' : '' }}" name="tanggal_pengajuan_pemohonan_berusaha" value="{{ old('tanggal_pengajuan_pemohonan_berusaha') }}" >
                        {!! $errors->first('tanggal_pengajuan_pemohonan_berusaha', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    
                    <div class="form-group">
                        <label for="tanggal_terbit_oss" class="control-label">{{ __('outlet.tanggal_terbit_oss') }}</label>
                        <input id="tanggal_terbit_oss" type="date" class="form-control{{ $errors->has('tanggal_terbit_oss') ? ' is-invalid' : '' }}" name="tanggal_terbit_oss" value="{{ old('tanggal_terbit_oss') }}" >
                        {!! $errors->first('tanggal_terbit_oss', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="jenis_perseroan" class="control-label">{{ __('outlet.jenis_perseroan') }}</label>
                        <select class="form-control" name="jenis_perseroan" id="jenis_perseroan">
                            <option>Pilih Jenis Perseroan</option>
                            <option value="Hotel dan Restoran">Hotel dan Restoran</option>
                            <option value="Perdagangan dan Reparasi">Perdagangan dan Reparasi</option>
                            <option value="Perumahan, Kawasan Industri, dan Perkantoran">Perumahan, Kawasan Industri, dan Perkantoran</option>
                            <option value="Transportasi, Gudang, dan Telekomunikasi">Transportasi, Gudang, dan Telekomunikasi</option>
                            <option value="Industri Kayu">Industri Kayu</option>
                            <option value="Konstruksi">Konstruksi</option>
                            <option value="Jasa Lainnya">Jasa Lainnya</option>
                        </select> 
                    </div>
                    <div class="form-group">
                        <label for="status_penanaman_modal" class="control-label">{{ __('outlet.status_penanaman_modal') }}</label>
                        <input id="status_penanaman_modal" type="text" class="form-control{{ $errors->has('status_penanaman_modal') ? ' is-invalid' : '' }}" name="status_penanaman_modal" value="{{ old('status_penanaman_modal') }}" >
                        {!! $errors->first('status_penanaman_modal', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div> 
                    <div class="form-group">
                        <label for="nama_pemegang_saham" class="control-label">{{ __('outlet.nama_pemegang_saham') }}</label>
                        <input id="nama_pemegang_saham" type="text" class="form-control{{ $errors->has('nama_pemegang_saham') ? ' is-invalid' : '' }}" name="nama_pemegang_saham" value="{{ old('nama_pemegang_saham') }}" >
                        {!! $errors->first('nama_pemegang_saham', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    -->
                    
            </div>
    </div>
    </div>
    <div class="col-md-6">
        <div class="card">
        <div class="card-body"> 
                    <!--
                    <div class="form-group">
                        <label for="total_modal" class="control-label">{{ __('outlet.total_modal') }}</label>
                        <input id="total_modal" type="number" class="form-control{{ $errors->has('total_modal') ? ' is-invalid' : '' }}" name="total_modal" value="{{ old('total_modal') }}" >
                        {!! $errors->first('total_modal', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="jabatan" class="control-label">{{ __('outlet.jabatan') }}</label>
                        <input id="jabatan" type="text" class="form-control{{ $errors->has('jabatan') ? ' is-invalid' : '' }}" name="jabatan" value="{{ old('jabatan') }}" >
                        {!! $errors->first('jabatan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="negara_asal" class="control-label">{{ __('outlet.negara_asal') }}</label>
                        <input id="negara_asal" type="text" class="form-control{{ $errors->has('negara_asal') ? ' is-invalid' : '' }}" name="negara_asal" value="{{ old('negara_asal') }}" >
                        {!! $errors->first('negara_asal', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="penanggung_jawab" class="control-label">{{ __('outlet.penanggung_jawab') }}</label>
                        <input id="penanggung_jawab" type="text" class="form-control{{ $errors->has('penanggung_jawab') ? ' is-invalid' : '' }}" name="penanggung_jawab" value="{{ old('penanggung_jawab') }}" >
                        {!! $errors->first('penanggung_jawab', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="kbli" class="label-required">{{ __('outlet.kbli') }}</label>
                        <input id="kbli" type="text" class="form-control{{ $errors->has('kbli') ? ' is-invalid' : '' }}" name="kbli" value="{{ old('kbli') }}" >
                        {!! $errors->first('kbli', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="bangunan" class="control-label">{{ __('outlet.bangunan') }}</label>
                        <input id="bangunan" type="number" class="form-control{{ $errors->has('bangunan') ? ' is-invalid' : '' }}" name="bangunan" value="{{ old('bangunan') }}" >
                        {!! $errors->first('bangunan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="mesin_peralatan" class="control-label">{{ __('outlet.mesin_peralatan') }}</label>
                        <input id="mesin_peralatan" type="text" class="form-control{{ $errors->has('mesin_peralatan') ? ' is-invalid' : '' }}" name="mesin_peralatan" value="{{ old('mesin_peralatan') }}" >
                        {!! $errors->first('mesin_peralatan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="peralatan_impor" class="control-label">{{ __('outlet.peralatan_impor') }}</label>
                        <input id="peralatan_impor" type="text" class="form-control{{ $errors->has('peralatan_impor') ? ' is-invalid' : '' }}" name="peralatan_impor" value="{{ old('peralatan_impor') }}" >
                        {!! $errors->first('peralatan_impor', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="pembelian_dan_pematangan_tanah" class="control-label">{{ __('outlet.pembelian_dan_pematangan_tanah') }}</label>
                        <input id="pembelian_dan_pematangan_tanah" type="text" class="form-control{{ $errors->has('pembelian_dan_pematangan_tanah') ? ' is-invalid' : '' }}" name="pembelian_dan_pematangan_tanah" value="{{ old('pembelian_dan_pematangan_tanah') }}" >
                        {!! $errors->first('pembelian_dan_pematangan_tanah', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="investasi_lain_lain" class="control-label">{{ __('outlet.investasi_lain_lain') }}</label>
                        <input id="investasi_lain_lain" type="text" class="form-control{{ $errors->has('investasi_lain_lain') ? ' is-invalid' : '' }}" name="investasi_lain_lain" value="{{ old('investasi_lain_lain') }}" >
                        {!! $errors->first('investasi_lain_lain', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="pembelian_pematangan_lain_lain" class="control-label">{{ __('outlet.pembelian_pematangan_lain_lain') }}</label>
                        <input id="pembelian_pematangan_lain_lain" type="text" class="form-control{{ $errors->has('pembelian_pematangan_lain_lain') ? ' is-invalid' : '' }}" name="pembelian_pematangan_lain_lain" value="{{ old('pembelian_pematangan_lain_lain') }}" >
                        {!! $errors->first('pembelian_pematangan_lain_lain', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="modal_kerja_3_bulanan" class="control-label">Modal Kerja 3 Bulanan</label>
                        <input id="modal_kerja_3_bulanan" type="number" class="form-control{{ $errors->has('modal_kerja_3_bulanan') ? ' is-invalid' : '' }}" name="modal_kerja_3_bulanan" value="{{ old('modal_kerja_3_bulanan') }}" >
                        {!! $errors->first('modal_kerja_3_bulanan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="gambar" class="control-label">Upload Gambar</label>
                        <div class="custom-file">
                            <input type="file" name="gambar" class="form-control{{ $errors->has('gambar') ? ' is-invalid' : '' }}" value="{{ old('gambar') }}">
                            {!! $errors->first('gambar', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        </div>
                    </div>
                    -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="latitude" class="control-label">{{ __('outlet.latitude') }}</label>
                                <input id="latitude" type="text" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" name="latitude" value="{{ old('latitude', request('latitude')) }}" >
                                {!! $errors->first('latitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="longitude" class="control-label">{{ __('outlet.longitude') }}</label>
                                <input id="longitude" type="text" class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" name="longitude" value="{{ old('longitude', request('longitude')) }}" >
                                {!! $errors->first('longitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <div id="mapid"></div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Submit" class="btn btn-success">
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

    $('#kecamatan').change(function(){
        if($(this).val() == "Balikpapan Barat"){
            $("#kelurahan").empty();
            $("#kelurahan").html("<option value='Margasari'>Margasari</option><option value='Margo Mulyo'>Margo Mulyo</option><option value='Baru Ulu'>Baru Ulu</option><option value='Kariangau'>Kariangau</option><option value='Baru Ilir'>Baru Ilir</option><option value='Baru Tengah'>Baru Tengah</option>");
        }else if($(this).val() == "Balikpapan Timur"){
            $("#kelurahan").empty();
            $("#kelurahan").html("<option value='Lamaru'>Lamaru</option><option value='Manggar'>Manggar</option><option value='Manggar Baru'>Manggar Baru</option><option value='Teritip'>Teritip</option>");
        }else if($(this).val() == "Balikpapan Kota"){
            $("#kelurahan").empty();
            $("#kelurahan").html("<option value='Damai'>Damai</option><option value='Klandasan Ilir'>Klandasan Ilir</option><option value='Klandasan Ulu'>Klandasan Ulu</option><option value='Prapatan'>Prapatan</option><option value='Telaga Sari'>Telaga Sari</option>");
        }else if($(this).val() == "Balikpapan Selatan"){
            $("#kelurahan").empty();
            $("#kelurahan").html("<option value='Damai Bahagia'>Damai Bahagia</option><option value='Damai Baru'>Damai Baru</option><option value='Gunung Bahagia'>Gunung Bahagia</option><option value='Sepinggan'>Sepinggan</option><option value='Sepinggan Baru'>Sepinggan Baru</option><option value='Sepinggan Raya'>Sepinggan Raya</option><option value='Sungai Nangka'>Sungai Nangka</option>");
        }else if($(this).val() == "Balikpapan Tengah"){
            $("#kelurahan").empty();
            $("#kelurahan").html("<option value='Gunung Sari Ilir'>Gunung Sari Ilir</option><option value='Gunung Sari Ulu'>Gunung Sari Ulu</option><option value='Karang Jati'>Karang Jati</option><option value='Karang Rejo'>Karang Rejo</option><option value='Mekar Sari'>Mekar Sari</option><option value='Sumber Rejo'>Sumber Rejo</option><option value=''></option>");
        }else if($(this).val() == "Balikpapan Utara"){
            $("#kelurahan").empty();
            $("#kelurahan").html("<option value='Batu Ampar'>Batu Ampar</option><option value='Graha Indah'>Graha Indah</option><option value='Gunung Samarinda'>Gunung Samarinda</option><option value='Gunung Samarinda Baru'>Gunung Samarinda Baru</option><option value='Karang Joang'>Karang Joang</option><option value='Muara Rapak'>Muara Rapak</option>");
        }

    });
</script>
@endpush
