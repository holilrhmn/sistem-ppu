@extends('frontend.app')

@section('content')

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h1 class="">
            Info Terkini
          </h1>
        </div>
      </div>
    </div>
    @foreach($info as $i)
    <div class="card">
        <div class="card-body">
            <ul>
            <a href="{{ route('info.show',$i->slug) }}">
                <div>
                    <h3 class="panel-title">{{ $i->judul }}
                </div>
            </a>
                <div style="margin-left: 40px;">
                    {!!  substr(strip_tags($i->deskripsi), 0, 250) !!}
                </div>
                <div style="margin-left: 40px;">
                    <a class="more"   href="{{ route('info.show',$i->slug) }}"> selengkapnya...</a>
                </div>
            </ul>
        </div>
    </div>


    @endforeach
    {{ $info->links() }}
    
   
  </div>

@endsection

