@extends('frontend.app')

@section('content')

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h1 class="">
            Sambutan
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
                <h2 class="h1 mt-0 mb-3">Introduction</h2>
              </div>
              @foreach($sambutan as $s)
              <p>
                <span style="font-size:12pt">
                    <span>
                        <span>
                            <img alt="" src="{{ url('public/sambutan/'.$s->foto) }}" style="float:left; height:220px; margin:20px; margin-top:5px !important; width:180px">
                            Selamat Datang,
                        </span>
                    </span>
                </span>
            </p>
              <p> {!! $s->isi_sambutan !!}</p>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

