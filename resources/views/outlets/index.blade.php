@extends('layouts.app')

@section('title', __('outlet.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Outlet)
        <a href="{{ route('outlets.create') }}" class="btn btn-success">{{ __('outlet.create') }}</a>
        @endcan
    </div>
    <h4 class="page-title">{{ __('app.total') }} {{ __('outlet.list') }} <small> : {{ $outlets->total() }} {{ __('outlet.outlet') }}</small></h4>
</div>


<div class="table-responsive">
    <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th class="text-center">{{ __('app.table_no') }}</th>
                <th>{{ __('outlet.name') }}</th>
                <th>{{ __('outlet.address') }}</th>
                <th class="text-center">{{ __('app.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($outlets as $key => $outlet)
            <tr>
                <td class="text-center">{{ $outlets->firstItem() + $key }}</td>
                <td>{!! $outlet->name_link !!}</td>
                <td>{{ $outlet->address }}</td>
                <td>
                    <a href="{{ route('outlets.edit', $outlet) }}" class="btn btn-primary btn-circle">
                        <i class="fas fa-pencil-square-o"></i>
                    </a>
                    <a href="{{ route('outlets.edit', [$outlet, 'action' => 'delete']) }}" class="btn btn-danger btn-circle">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card-body">{{ $outlets->appends(Request::except('page'))->render() }}</div>
</div>

@endsection