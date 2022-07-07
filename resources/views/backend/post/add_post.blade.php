@extends('backend.layouts.main')
@push('title')Add Post @endpush
@push('add-post-active')active @endpush
@push('post-active')active @endpush

@push('scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
      selector: 'textarea#editor', });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"
  integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA=="
  crossorigin="anonymous" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
  integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous" defer>
</script>
<script defer>
  tinymce.init({
            selector:'#editor',
            menubar: false,
            statusbar: false,
            plugins: 'autoresize anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars',
            toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help fullscreen ',
            skin: 'bootstrap',
            toolbar_drawer: 'floating',
            min_height: 200,           
            autoresize_bottom_margin: 16,
            setup: (editor) => {
                editor.on('init', () => {
                    editor.getContainer().style.transition="border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out"
                });
                editor.on('focus', () => {
                    editor.getContainer().style.boxShadow="0 0 0 .2rem rgba(0, 123, 255, .25)",
                    editor.getContainer().style.borderColor="#80bdff"
                });
                editor.on('blur', () => {
                    editor.getContainer().style.boxShadow="",
                    editor.getContainer().style.borderColor=""
                });
            }
        });

        window.onload = function(){
            //     var tox = document.getElementsByClassName('tox-notification__dismiss')[0];
            //     tox.click();
            let tox = document.getElementsByClassName('tox')[1];
            // console.log(tox);
            tox.classList.add('hidden');
    };

   
</script>
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<script src="{{ asset('js/validator.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" defer></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
  rel="stylesheet" />
<style>
  .bootstrap-tagsinput .tag {
    margin-right: 2px;
    color: #ffffff;
    background: #2196f3;
    padding: 3px 7px;
    border-radius: 3px;
  }

  .bootstrap-tagsinput {
    width: 100%;
  }
</style>
@endpush


@section('content')
@include('backend.layouts.navbar')

<div class="container-fluid">

  <form action="{{ url('post/create') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mt-4 mb-4">
      <div class="row justify-content-md-center">
        <div class="col-md-12 col-lg-10">
          <h1 class="h2 mb-4">Add Post</h1>
          <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Post Title" required>
          </div>
          <div class="form-group my-2">
            <label for="slug">Post Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" placeholder="Post Slug" required>
            <a type="button" id="auto-tag-genarate" class="btn btn-primary btn-sm my-2">Genarate</a>
          </div>
          <div class="mb-3">
            <select multiple data-role="tagsinput" class="bootstrap-tagsinput" name="tags">
            </select>
            @if ($errors->has('tags'))
            <span class="text-danger">{{ $errors->first('tags') }}</span>
            @endif

          </div>

          <select name="category_select" id="category_select" class="form-select">
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
          <div class="form-group mt-2">
            <label for="image">Please Select Image</label>
            <input type="file" id="image" name="image" class="@error('image') is-invalid @enderror form-control">
            @error('image')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group my-3">
            <textarea id="editor" name="content" required></textarea>
          </div>
          <div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

@endsection