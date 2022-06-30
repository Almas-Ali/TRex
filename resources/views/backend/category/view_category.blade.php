@extends('layouts.main')
@push('title')
Categories - Admin@CNPI BLOG
@endpush
@push('admin-active')active @endpush
@push('category-active')active @endpush
@section('content')

@include('layouts.navbar')

<div class="container">

    <div class="my-3">
        <form class="row g-3" method="get" action="{{ route('add_category') }}">
            @if(isset($message))
            <p class="alert alert-success">{{ $message }}</p>
            @endif

            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif

            <div class="col-auto">
                {{-- <label for="add_category" class="visually-hidden">Add Category</label> --}}
                <input type="text" class="form-control is-validation  @error('add_category') is-invalid @enderror"
                    name="add_category" id="add_category_check" placeholder="Add Category" required>

                <span class="invalid-feedback hidden" role="alert" id="add_error">
                    <strong>The add category must be at least 4 characters.</strong>
                </span>
                @error('add_category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3" id="add_btn">Add</button>
            </div>
        </form>
    </div>


    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Name</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp

            @foreach ($categories as $category)
            <tr>
                <th scope="row">{{ $i }}</th>
                <td>{{ $category->name }}</td>
                <td class="text-light">
                    <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-primary btn-sm" type="button"
                        class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="{{ '#edit_modal_'.$category->id }}">Edit</a>
                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#edit_modal">
                        Edit
                    </button> --}}

                    <a href="{{ url('category/delete/'.$category->id) }}" class="btn btn-primary btn-sm">Delete</a>
                </td>
            </tr>
            @php $i++; @endphp

            <div class="modal fade" id="{{ 'edit_modal_'.$category->id }}" tabindex="-1"
                aria-labelledby="edit_modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="edit_modalLabel">Edit Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="my-3">
                                <form class="row g-3" method="post" action="{{ url('category/edit/'.$category->id) }}">
                                    @csrf
                                    <div class="col-auto">
                                        <label for="edit_category" class="visually-hidden">Add Category</label>
                                        <input type="text"
                                            class="form-control @error('edit_category') is-invalid @enderror"
                                            value="@if(isset($category)){{ $category->name }}@else{{ old('edit_category')}}@endif"
                                            id="edit_category_check" name="{{ 'edit_category_'.$category->id }}"
                                            placeholder="Edit Category" required>
                                        <span class="invalid-feedback hidden" role="alert" id="edit_error">
                                            <strong>The add category must be at least 4 characters.</strong>
                                        </span>

                                        @error('edit_category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mt-3" align="right">
                                        <button type="submit" class="btn btn-primary" id="edit_btn">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </tbody>
    </table>
</div>

@endsection