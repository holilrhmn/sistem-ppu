
@extends('Dashboard.layouts.default')
@section('content')

<div class="card card-outline card-primary">
    <div class="row">
        <div class="container">
            <div class="col-lg-12 margin-tb">

                <div class="pull-left ">`

                    <h2>Data Dokumen Pembangunan</h2>

                </div>

                <div class="pull-right mt-1 mb-3">

                    <a class="btn btn-primary" href="{{ route('dashboard.dokumen-pembangunan.create') }}"><i class="fas fa-plus-circle"></i>  Tambah Data Pembangunan</a>

                </div>

            </div>
        </div>


    </div>

    <div class="container">
        <div class="table-responsive">
        <table id="table" class="table table-bordered table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                @foreach($pembangunan  as $a)

                   <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $a->judul }}</td>
                        <td>{{ $a->deskripsi }}</td>
                        <td><a href="{{ route('pembangunan.download', $a->dokumen) }}" class="btn btn-success btn-sm" id="download"><i class="fas fa-download"></i> Download</a></td></td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('dashboard.dokumen-pembangunan.edit',$a) }}"><i class="fas fa-edit"></i>Edit</a>
                            <button href="{{route('dashboard.dokumen-pembangunan.destroy', $a)}}" class="btn btn-danger btn" id="delete"><i class="fas fa-trash"></i> Hapus</button>
                        </td>
                   </tr>

                @endforeach

             </tbody>
        </table>
    </div>

    <br/>

    {{-- {{ $category->links() }} --}}
    </div>
    </div>

</div>

<form action="" method="post" id="deleteForm">
@csrf
@method("DELETE")
<input type="submit" value="Hapus" style="display:none">
</form>
@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
$('button#delete').on('click', function(e){
  e.preventDefault();

  var href = $(this).attr('href');

  Swal.fire({
      title: 'Apakah Kamu yakin akan menghapus data ini?',
      text: "Data yang sudah dihapus tidak dapat dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus!'
      }).then((result) => {
      if (result.value) {
          document.getElementById('deleteForm').action = href;
          document.getElementById('deleteForm').submit();
              Swal.fire(
              'Berhasi Dihapus!',
              'Data Kamu Berhasil Dihapus.',
              'success'
              )
          }
      })


})
</script>
<script>
    $(document).ready(function() {
      $('#table').DataTable();
  } );
   </script>
@endpush
@endsection
