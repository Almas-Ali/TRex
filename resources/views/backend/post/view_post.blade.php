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
                                <td><a href="{{ url('posts/'. $post->slug) }}" target="_blank"
                                        rel="noopener noreferrer">
                                        {{ Str::limit(strip_tags($post->title), 40) }}
                                    </a></td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->updated_at }}</td>
                                <td class="text-light">
                                    <a href="{{ url('post/edit/'.$post->id) }}" class="btn btn-primary btn-sm"
                                        type="button">Edit</a>

                                    <a href="{{ url('post/delete/'.$post->id) }}"
                                        class="btn btn-primary btn-sm">Delete</a>
                                </td>
                            </tr>
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