
@extends('Dashboard.layouts.default')

@section('content')

    <section class="section">
      <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item">Profile</div>
        </div>
      </div>
      <div class="section-body">
        <h2 class="section-title">Hai, {{ Auth::user()->name }}</h2>
        <p class="section-lead">
          Change information about yourself on this page.
        </p>

        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
              <form method="post" class="needs-validation" novalidate="">
                <div class="card-header">
                  <h4>Edit Profile</h4>
                </div>
                <div class="card-body">
                 
                    
                    <div class="row">
                      <div class="form-group col-md-12 col-12">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="name" required="">
                        <div class="invalid-feedback">
                          Please fill in the first name
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12 col-12">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required="">
                        <div class="invalid-feedback">
                          Please fill in the email
                        </div>
                      </div>
                    </div>
                  
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-5">
            <div class="card">
              <form method="post" class="needs-validation" novalidate="">
                <div class="card-header">
                  <h4>Edit Password</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                    <form  method="POST" action="{{ route('dashboard.changePassword') }}">
                      @csrf
                      <div class="form-group col-md-12 col-12">
                        <label>Password Lama</label>
                        <input type="password" class="form-control" placeholder="Masukkan Password Lama Anda" value="" name="current-password" id="OldPassword" required="">
                        <div class="invalid-feedback">
                          Silahkan Isi Password lama anda
                        </div>
                      </div>
                      <div class="form-group col-md-12 col-12">
                        <label>Password Baru</label>
                        <input type="password" class="form-control"  placeholder="Masukkan Password Baru" id="NewPassword" name="new-password" value="" required="">
                        <div class="invalid-feedback">
                          Silahkan Isi Password Baru
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12 col-12">
                        <label>Konfirmasi Password</label>
                        <input type="password" id="NewPasswordConfirm" placeholder="Masukkan Konfirmasi Password" name="new-password_confirmation" class="form-control" value="" required="">
                        <div class="invalid-feedback">
                          Silahkan Masukkan Konfirmasi Password baru
                        </div>
                      </div>
                    </form>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Simpan Password</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection