
@extends('Dashboard.layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Info Terkini</h3>
        </div>
        <div class="card-body">
            <form  action="{{ route('dashboard.info-terkini.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                  <label for=""@error('judul') class="text-danger" @enderror >Judul</label>
                  <input type="text" name="judul" class="form-control @error('judul') form-control is-invalid @enderror"
                  placeholder="Masukkan Judul" value="{{ old('judul') }}">
                  @error('judul')
                      <span  class="text-danger"> {{ $message }} </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for=""@error('deskripsi') id="content class="text-danger" @enderror >Deskripsi</label>
                <textarea name="deskripsi" id="" rows="3" class="form-control my-editor @error('deskripsi') form-control is-invalid @enderror"
                placeholder="Masukkan Deskripsi Info Terkini"> {{old ('deskripsi') }} </textarea>
                @error('deskripsi')
                    <span  class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            
              {{-- <div class="form-group @error('penulis_id') has-error @enderror ">
                <label for=""@error('penulis_id') class="text-danger" @enderror >Penulis</label>
                <select name="penulis_id" class="form-control select2" >
                        <option value="">Penulis</option>
                    @foreach ($penulis as $k)
                        <option value="{{ $k->id }}">{{ $k->name}}</option>
                    @endforeach
                </select>
                @error('penulis_id')
                    <span  class="help-block"> {{ $message }} </span>
                @enderror
              </div> --}}
              
                
                <div class="form-group">
                    <input type="submit" value="Tambah" class="btn btn-primary mt-3">
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
