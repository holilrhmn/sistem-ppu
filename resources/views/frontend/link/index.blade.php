@extends('frontend.app')

@section('content')

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h1 class="">
            Link Terkait
          </h1>
        </div>
      </div>
    </div>
    @foreach($link as $l)
    
            <ul>
            <a href="{{ $l->link }}">
                <div>
                    <h2 class=""> <i class="fas fa-circle small"></i> {{ $l->title }}</h2>
                    <p style="margin-left: 17px;">{{ $l->link }}</p>
                </div>
            </a>
                
            </ul>
       
    @endforeach
    {{ $link->links() }}
    
   
  </div>

@endsection


