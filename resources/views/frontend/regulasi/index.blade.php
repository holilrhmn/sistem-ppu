@extends('frontend.app')

@section('content')

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h1 class="">
            Regulasi
          </h1>
        </div>
      </div>
    </div>
    

    

<div class="table-responsive">
    <table class="table table-vcenter">
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
          @foreach($regulasi as $r)
          <td >{{ $r->judul }}</td>
          <td class="text-muted" >
            {{ $r->tentang }}
          </td>
         
          <td class="text-muted" >
            <a href="{{ route('dokumen.download', $r->dokumen) }}" class="btn btn-success btn-sm" id="download"><i class="fas fa-download"></i>  Download</a>
          </td>
          @endforeach
        </tr>
      </tbody>
    </table>
  </div>
  
  
   
  </div>

@endsection


