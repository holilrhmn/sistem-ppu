@extends('layouts.app')

@section('title', 'Import Data dari File Excel ke Database')

@section('content')
<div class="form-inline">
    @if ($errors->has('gambar'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('gambar') }}</strong>
    </span>
    @endif
    @if ($sukses = Session::get('sukses'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $sukses }}</strong>
    </div>
    @endif

    <form method="POST" action="{{route('importFileExcel')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
                <input type="file" name="gambar" required="required" class="form-control{{ $errors->has('gambar') ? ' is-invalid' : '' }}">
                {!! $errors->first('gambar', '<span class="invalid-feedback" role="alert">:message</span>') !!} 
                <input type="submit" value="Import Data" class="form-control mx-sm-2 btn btn-primary">
        </div>
    </form>

    <form method="GET" action="{{route('downloadFormatImportData')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        
        <input type="submit" value="Download Format Import Data" class="form-control mx-sm-2 btn btn-success">
    </form>
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