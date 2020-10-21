@extends('Dashboard.layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data Tahun</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.tahun.update', $tahun)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
              <div class="form-group">
                  <label for=""@error('tahun') class="text-danger" @enderror >Tahun</label>
                  <input type="text" name="tahun" class="form-control @error('tahun') form-control is-invalid @enderror"
                  placeholder="Masukkan type" value="{{$type->name ??  old('tahun') }}">
                  @error('tahun')
                      <span  class="text-danger"> {{ $message }} </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for=""@error('jumlah') class="text-danger" @enderror >Jumlah</label>
                <input type="text" name="jumlah" class="form-control @error('jumlah') form-control is-invalid @enderror"
                placeholder="Masukkan Pertanyaan" value="{{$tahun->jumlah old('jumlah') }}">
                @error('jumlah')
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

