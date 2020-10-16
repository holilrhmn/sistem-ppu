@extends('frontend.app')

@section('content')

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h1 class="">
            Sejarah Database PPU
          </h1>
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
              @foreach($sejarah as $s)
            
              <p> {!! $s->isi_sejarah !!}</p>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

