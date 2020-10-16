@extends('Dashboard.layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="hero bg-primary text-white">
                        <div class="hero-inner">
                          <h2>Selamat Datang Kembali, {{ Auth::user()->name }}</h2>
                          <p class="lead">Dashboard ini berfungsi untuk memanajemen konten TERAS PPU</p>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
