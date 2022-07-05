@extends('backend.layouts.main')
@push('title')
Posts - Admin@CNPI BLOG
@endpush
@push('all-post-active')active @endpush
@push('post-active')active @endpush

@section('content')
@include('backend.layouts.navbar')

<div class="container">
  <div class="my-3">
    @if(isset($message))
    <p class="alert alert-success px-3">{{ $message }}</p>
    @endif

    @if (session('message'))
    <div class="alert alert-success px-3">
      {{ session('message') }}
    </div>
    @endif
    <div class="container-fluid pt-2 px-2">
      <a href="{{ route('add_post') }}" class="btn btn-primary mb-3" type="button">Add Post</a>
      <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
          <h6 class="mb-0">All Posts</h6>
        </div>
        <div class="table-responsive">
          <table class="table text-start align-middle table-bordered table-hover mb-0">
            <thead>
              <tr class="text-dark">
                <th scope="col">S.No</th>
                <th scope="col">Title</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @php $i = 1; @endphp

              @foreach ($posts as $post)
              <tr>
                <td scope="row">{{ $i }}</th>
                <td><a href="{{ url('posts/'. $post->slug) }}" target="_blank" rel="noopener noreferrer">
                    {{ Str::limit(strip_tags($post->title), 40) }}
                  </a></td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                <td class="text-light">
                  <a href="{{ url('post/edit/'.$post->id) }}" class="btn btn-primary btn-sm" type="button">Edit</a>

                  {{-- <a href="{{ url('post/delete/'.$post->id) }}" class="btn btn-primary btn-sm">Delete</a> --}}
                  <a href="javascript:void(0);" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                    data-bs-target="#post_delete_{{$post->id}}">Delete</a>
                </td>
              </tr>

              <!-- Modal -->
              <div class="modal fade" id="post_delete_{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                    </div>
                    <div class="modal-body">
                      <p>Are you sure you want to delete this post ?</p>
                      <p><strong>Post Title:</strong>{{ $post->title }}</p>
                    </div>
                    <div class="modal-footer" align="center">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="{{ url('post/delete/'.$post->id) }}" class="btn btn-danger">Delete</a>
                    </div>
                  </div>
                </div>


                @php $i++; @endphp
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection