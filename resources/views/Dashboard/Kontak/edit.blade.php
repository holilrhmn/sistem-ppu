@extends('Dashboard.layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data Kontak</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.kontak.update', $kontak)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="form-group">
                  <label for=""@error('nama') class="text-danger" @enderror >Nama Sistem</label>
                  <input type="text" name="nama" class="form-control @error('nama') form-control is-invalid @enderror"
                  placeholder="Masukkan Judul artikel" value="{{$kontak->nama ?? old('nama') }}">
                  @error('nama')
                      <span  class="text-danger"> {{ $message }} </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for=""@error('email') class="text-danger" @enderror >Email</label>
                <input type="text" name="email" class="form-control @error('email') form-control is-invalid @enderror"
                placeholder="Masukkan Alamat Email" value="{{$kontak->email ?? old('email') }}">
                @error('email')
                    <span  class="text-danger"> {{ $message }} </span>
                @enderror
              </div>
              <div class="form-group">
                <label for=""@error('telp') class="text-danger" @enderror >Telp</label>
                <input type="text" name="telp" class="form-control @error('telp') form-control is-invalid @enderror"
                placeholder="Masukkan No Telp" value="{{$kontak->telp ?? old('telp') }}">
                @error('telp')
                    <span  class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
                <div class="form-group">
                    <label for=""@error('alamat') id="content class="text-danger" @enderror >Alamat</label>
                    <textarea name="alamat" id="" rows="3" class="form-control my-editor @error('alamat') form-control is-invalid @enderror"
                    placeholder="Masukkan Alamat"> {{ $kontak->alamat }} </textarea>
                    @error('alamat')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for=""@error('logo') class="text-danger" @enderror >Logo</label>
                    <input type="file" name="logo" class="form-control">
                    @error('logo')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                    <b><p class="">Format Foto: JPG,JPEG,PNG</p></b>
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

