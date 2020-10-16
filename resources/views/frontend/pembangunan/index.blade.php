@extends('frontend.app')

@section('content')

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h1 class="">
            Dokumen Pembangunan
          </h1>
        </div>
      </div>
    </div>
    
<div class="box">
  <div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
      <thead>
        <tr>
          <th>Judul</th>
          <th>Deskripsi</th>
          <th>Unduh Dokumen</th>
          <th class="w-1"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          @foreach($pembangunan as $r)
          <td >{{ $r->judul }}</td>
          <td class="text-muted" >
            {{ $r->deskripsi }}
          </td>
         
          <td class="text-muted" >
            <a href="{{ route('pembangunan.download', $r->dokumen) }}" class="btn btn-success btn-sm" id="download"><i class="fas fa-download"></i>  Download</a>
          </td>
          @endforeach
        </tr>
      </tbody>
    </table>
  </div>
  </div>
</div>

  
   
  </div>

@endsection


