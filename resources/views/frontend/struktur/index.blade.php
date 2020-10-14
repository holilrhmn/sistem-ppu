@extends('frontend.app')

@section('content')

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h2 class="page-title">
           Struktur Organisasi
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
              </div>
              @foreach($struktur as $s)
              
                <img alt="" src="{{ url('public/struktur/'.$s->gambar) }}" >
                
             
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

