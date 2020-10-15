@extends('frontend.app')
@section('content')

<div class="row">
    <div class="col">
       <div class="card rounded shadow mb-4">
            <div class="card-body">
              <h2 class="font-weight-bold px-5">{{ $info->judul }}</h2>
              
                <div class="text-center ">
                    <span class="text-black-50 px-2"><i class="far fa-user"></i>  <strong>by:{{ $info->penulis->name }}</strong></span>
                    <span class="text-black-50"><i class="far fa-calendar-alt"></i> <strong>{{ TanggalID('j M Y', $info->created_at) }}</strong></span>
                    
                </div>
            </div>
            
            <div class="card-body">
                <p class="card-text text-justify">{!! $info->deskripsi !!}</p>
                <hr>
            </div>
       </div>
    </div> 
</div>
<!--Column Kategori-->
@endsection