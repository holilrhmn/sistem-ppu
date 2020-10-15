@extends('frontend.app')

@section('content')

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h2 class="">
            Kontak
          </h2>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
     
      <div class="col-lg-12">
        <div class="card card-lg">
          <div class="card-body">
            <div class="markdown">
              <div class="d-flex">
                <h2 class="h1 mt-0 mb-3"></h2>
              </div>
                
            @foreach($kontak as $k)  
            <div class="col-md-12">
                <center>
                    <img src="{{ url('public/kontak/'.$k->logo) }}" style="max-height: 120px; ">
                </center>
            </div>
            <div class="col-md-12">
                <center>
                    <h2>{{ $k->nama }}</h2>
                    <h3 class="contact-info"><a href="/kontak"><i class="ti-headphone-alt"></i>{{ $k->telp }}</a> </h3>
                    <h3 class="contact-info"><a href="/kontak"><i class=" ti-email"></i> {{ $k->email }}</a></h3>
                    <h3 class="contact-info"><a href="https://goo.gl/maps/pEES642p1XH2"><i class="ti-location-pin"></i> {!! $k->alamat !!}</a></h3>
                </center>
            </div>
        
            @endforeach 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

