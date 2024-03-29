@extends('backend.layouts.main')
@push('title')Users @endpush
@push('users-active')active @endpush
@push('all_users-active')active @endpush

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
      <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
          <h6 class="mb-0">All Users</h6>
        </div>
        <div class="table-responsive">
          <table class="table text-start align-middle table-bordered table-hover mb-0">
            <thead>
              <tr class="text-dark">
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Username</th>
                <th scope="col">Photo</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              {{-- @if (!empty($posts))
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

                  <a href="{{ url('post/delete/'.$post->id) }}" class="btn btn-primary btn-sm">Delete</a>
                  <a href="javascript:void(0);" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                    data-bs-target="#post_delete_{{$post->id}}">Delete</a>
                </td>
              </tr> --}}

              @foreach ($users as $user)
              <tr>
                <td>
                  {{ $user->name }}
                  @if ( $user->is_admin == 1 )
                  <i class="fa fa-crown" aria-hidden="true" style="color: #996515;"></i>
                  @else
                  @endif
                </td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->username }}</td>
                <td>
                  <img src="{{ $user->photo_path }}" alt="{{ $user->photo_name }}" height="50px" width="50px">
                </td>
                <td>
                  <a href="#!" class="btn btn-primary btn-sm">Edit</a>
                  <a href="#!" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
              @endforeach

              {{--
              <!-- Modal -->
              <div class="modal fade" id="post_delete_{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
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
                </div> --}}

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection