@extends('Dashboard.layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data Angkutan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.angkutan.update', $angkutan)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
               <div class="form-group">
                  <label for=""@error('nama_angkutan') class="text-danger" @enderror >Nama angkutan</label>
                  <input type="text" name="nama_angkutan" class="form-control @error('nama_angkutan') form-control is-invalid @enderror"
                  placeholder="Masukkan Nama Angkutan" value="{{$angkutan->nama_angkutan ?? old('nama_angkutan') }}">
                  @error('nama_angkutan')
                      <span  class="text-danger"> {{ $message }} </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for=""@error('nama_supir') class="text-danger" @enderror >Nama Supir</label>
                <input type="text" name="nama_supir" class="form-control @error('nama_supir') form-control is-invalid @enderror"
                placeholder="Masukkan Nama Supir" value="{{$angkutan->nama_supir ?? old('nama_supir') }}">
                @error('nama_supir')
                    <span  class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
              <label for=""@error('plat_no') class="text-danger" @enderror >Plat Nomor</label>
              <input type="text" name="plat_no" class="form-control @error('plat_no') form-control is-invalid @enderror"
              placeholder="Masukkan Nama Plat Nomor" value="{{$angkutan->plat_no ?? old('plat_no') }}">
              @error('plat_no')
                  <span  class="text-danger"> {{ $message }} </span>
              @enderror
          </div>
            <div class="form-group @error('merk_id') has-error @enderror ">
              <label for=""@error('merk_id') class="text-danger" @enderror >Merk Angkutan</label>
              <select name="merk_id" class="form-control select2" >
                  @foreach ($merk as $k)
                  <option value="{{ $k->id }}"
                      @if ($k->id == $angkutan->merk_id)
                          selected
                      @endif
                  >
                      {{ $k->name}}</option>
                  @endforeach
              </select>
              @error('kategori_id')
                  <span  class="help-block"> {{ $message }} </span>
              @enderror
          </div>
          <div class="form-group @error('kategori_id') has-error @enderror ">
            <label for=""@error('type_id') class="text-danger" @enderror >Type Angkutan</label>
            <select name="type_id" class="form-control select2" >
                @foreach ($type as $k)
                <option value="{{ $k->id }}"
                    @if ($k->id == $angkutan->type_id)
                        selected
                    @endif
                >
                    {{ $k->name}}</option>
                @endforeach
            </select>
            @error('kategori_id')
                <span  class="help-block"> {{ $message }} </span>
            @enderror
        </div>
            <div class="form-group">
                <label for=""@error('tahun') class="text-danger" @enderror >Tahun kendaraan</label>
                <input type="text" name="tahun_kendaraan" class="form-control @error('tahun') form-control is-invalid @enderror"
                placeholder="Masukkan Tahun Kendaraan" value="{{$angkutan->tahun ?? old('tahun') }}">
                @error('tahun')
                    <span  class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
              <label for=""@error('frekuensi') class="text-danger" @enderror >Frekuensi Pengambilan</label>
              <input type="text" name="frekuensi" class="form-control @error('frekuensi') form-control is-invalid @enderror"
              placeholder="Masukkan Frekuensi " value="{{ $angkutan->frekuensi ?? old('frekuensi') }}">
              @error('frekuensi')
                  <span  class="text-danger"> {{ $message }} </span>
              @enderror
          </div>
          <div class="form-group">
            <label for=""@error('jumlah_tps') class="text-danger" @enderror >Jumlah TPS</label>
            <input type="text" name="jumlah_tps" class="form-control @error('jumlah_tps') form-control is-invalid @enderror"
            placeholder="Masukkan Jumlah TPS " value="{{$angkutan->jumlah_tps ?? old('jumlah_tps') }}">
            @error('jumlah_tps')
                <span  class="text-danger"> {{ $message }} </span>
            @enderror
        </div>
        <div class="form-group">
          <label for=""@error('panjang_rute') class="text-danger" @enderror >Panjang Rute </label>
          <input type="text" name="panjang_rute" class="form-control @error('panjang_rute') form-control is-invalid @enderror"
          placeholder="Masukkan Panjang Rute" value="{{$angkutan->panjang_rute ?? old('panjang_rute') }}">
          @error('panjang_rute')
              <span  class="text-danger"> {{ $message }} </span>
          @enderror
      </div>
      <div class="form-group">
        <label for=""@error('panjang_jalan') class="text-danger" @enderror >Panjang jalan</label>
        <input type="text" name="panjang_jalan" class="form-control @error('panjang_jalan') form-control is-invalid @enderror"
        placeholder="Masukkan Panjang jalan" value="{{$angkutan->panjang_jalan ?? old('panjang_jalan') }}">
        @error('panjang_jalan')
            <span  class="text-danger"> {{ $message }} </span>
        @enderror
    </div>
      <div class="form-group">
        <label for=""@error('durasi_pengangkutan') class="text-danger" @enderror >Durasi Pengangkutan Sampah perbak sampah</label>
        <input type="text" name="durasi_pengangkutan" class="form-control @error('durasi_pengangkutan') form-control is-invalid @enderror"
        placeholder="Masukkan durasi pengangkutan" value="{{$angkutan->durasi_pengangkutan ?? old('durasi_pengangkutan') }}">
        @error('durasi_pengangkutan')
            <span  class="text-danger"> {{ $message }} </span>
        @enderror
      </div>
      <div class="form-group">
        <label for=""@error('total_waktu') class="text-danger" @enderror >Total Waktu Pengangkutan</label>
        <input type="text" name="total_waktu" class="form-control @error('total_waktu') form-control is-invalid @enderror"
        placeholder="Masukkan Total Waktu" value="{{$angkutan->total_waktu ?? old('total_waktu') }}">
        @error('total_waktu')
            <span  class="text-danger"> {{ $message }} </span>
        @enderror
    </div>
    <div class="form-group">
      <label for=""@error('deskripsi') id="content class="text-danger" @enderror >Deskripsi</label>
      <textarea name="trayek" id="" rows="3" class="form-control my-editor @error('deskripsi') form-control is-invalid @enderror"
      placeholder="Masukkan Trayek">{{ $angkutan->trayek }}</textarea>
      @error('deskripsi')
          <span  class="text-danger"> {{ $message }} </span>
      @enderror
    </div>

                <div class="form-group">
                    <input type="submit" value="Update" class="btn btn-primary mt-3">
                </div>
            </form>
        </div>
    </div>
@endsection

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>

