
@extends('Dashboard.layouts.default')

@section('content')

<div class="row mt-5">

  <div class="col-lg-12 margin-tb">

      <div class="pull-left">

          <h3>Profil {{ Auth::user()->name }}</h3>

      </div>

      {{-- <div class="">

          <a class="btn btn-warning shadow " href="{{ route('home') }}"> Back</a>

      </div> --}}

  </div>

</div>

<div class="card shadow rounded">
  <div class="card-body">
      @if (count($errors) > 0)

      <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

           @foreach ($errors->all() as $error)

             <li>{{ $error }}</li>

           @endforeach

        </ul>

      </div>

    @endif


    {!! Form::model($user, ['method' => 'POST','route' => ['update.profil', $user->id]]) !!}

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Nama:</strong>

                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Email:</strong>

                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Password Baru:</strong>

                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Konfirmasi Password:</strong>

                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <button type="submit" class="btn btn-primary" style="border-radius:12px;">Ubah Profil</button>

        </div>

    </div>

    {!! Form::close() !!}
  </div>
</div>
@endsection