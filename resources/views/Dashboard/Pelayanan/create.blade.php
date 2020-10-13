@extends('Dashboard.layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Standar Pelayanan</h3>
        </div>
        <div class="card-body">
            <form  action="{{ route('dashboard.pelayanan.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
               
                <div class="form-group">
                    <label for=""@error('isi_pelayanan') id="content class="text-danger" @enderror >Isi Pelayanan</label>
                    <textarea name="isi_pelayanan" id="" rows="3" class="form-control my-editor @error('isi_pelayanan') form-control is-invalid @enderror"
                    placeholder="Masukkan Isi Sambutan"> {{old ('isi_pelayanan') }} </textarea>
                    @error('isi_spelayanan')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
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
