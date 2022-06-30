@extends('layouts.main')
@push('title')
Posts - Admin@CNPI BLOG
@endpush
@push('admin-active')active @endpush
@push('post-active')active @endpush

@section('content')
@include('layouts.navbar')

<div class="container">

    <div class="my-3">

        <a href="{{ route('add_post') }}" class="btn btn-primary" type="button">Add Post</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp

                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $i }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td class="text-light">
                        <a href="{{ url('post/edit/'.$post->id) }}" class="btn btn-primary btn-sm" type="button"
                            class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="{{ '#edit_modal_'.$post->id }}">Edit</a>
                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#edit_modal">
                            Edit
                        </button> --}}

                        <a href="{{ url('post/delete/'.$post->id) }}" class="btn btn-primary btn-sm">Delete</a>
                    </td>
                </tr>
                @php $i++; @endphp

                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection