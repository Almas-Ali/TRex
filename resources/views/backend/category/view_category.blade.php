@extends('backend.layouts.main')
@push('title')Categories @endpush
@push('category-active')active @endpush
@section('content')

@include('backend.layouts.navbar')

<div class="container pt-2 px-2">

  <div class="my-3">
    {{-- <form class="row g-3" method="get" action="{{ route('add_category') }}"> --}}
      <div class="container mt-3">
        @if(isset($message))
        <p class="alert alert-success">{{ $message }}</p>
        @endif

        @if(count($errors->all()) > 0)
        @foreach ($errors->all() as $error)
        <p class="alert alert-success">{{ $error }}</p>
        @endforeach
        @endif

        @if (session('message'))
        <div class="alert alert-success">
          {{ session('message') }}
        </div>
        @endif
      </div>

      <div class="col-auto">
        {{-- <label for="add_category" class="visually-hidden">Add Category</label> --}}
        {{-- <input type="text" class="form-control is-validation  @error('add_category') is-invalid @enderror"
          name="add_category" id="add_category_check" placeholder="Add Category" required>

        <span class="invalid-feedback hidden" role="alert" id="add_error">
          <strong>The add category must be at least 4 characters.</strong>
        </span>
        @error('add_category')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror --}}
        <div class="col-auto">
          {{-- <button type="submit" class="btn btn-primary mb-3" id="add_btn">Add</button> --}}
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_categories">
            Add
          </button>

        </div>

        <div class="modal fade" id="add_categories" tabindex="-1" aria-labelledby="Add Categories" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="my-3">
                  <form class="row g-3" method="post" action="{{ route('add_category') }}">
                    @csrf

                    <div class="">
                      <label for="category_name">Name</label>
                      <input type="text" name="category_name" id="category_name"
                        class="form-control @error('category_name')is-invalid @enderror"
                        value="{{ old('category_name') }}" required autofocus>

                      @error('category_name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="">
                      <label for="category_slug">Slug</label>
                      <input type="text" name="category_slug" id="category_slug"
                        class="form-control @error('category_slug')is-invalid @enderror"
                        value="{{ old('category_slug') }}" required>

                      @error('category_slug')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="">
                      <label for="category_dsc">Description</label>
                      <input type="text" name="category_dsc" id="category_dsc"
                        class="form-control @error('category_dsc')is-invalid @enderror"
                        value="{{ old('category_dsc') }}" required>

                      @error('category_dsc')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="mt-3" align="center">
                      <button type="submit" class="btn btn-primary w-25 rounded" id="add_btn">Create</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>


  <div class="bg-light rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0">All Categories</h6>
    </div>
    <div class="table-responsive">
      <table class="table text-start align-middle table-bordered table-hover mb-0">
        <thead>
          <tr class="text-dark">
            <th scope="col">S.No</th>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Description</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if (!empty($categories))
          @php $i = 1; @endphp
          @foreach ($categories as $category)
          <tr>
            <td scope="row">{{ $i }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>{{ $category->description }}</td>
            <td>{{ $category->created_at }}</td>
            <td>{{ $category->updated_at }}</td>
            <td class="text-light">
              <a href="javascript:void(0);" class="btn btn-primary btn-sm" type="button" class="btn btn-primary"
                data-bs-toggle="modal" data-bs-target="{{ '#edit_modal_'.$category->id }}">Edit</a>
              <a href="{{ url('category/delete/'.$category->id) }}" class="btn btn-danger btn-sm">Delete</a>
            </td>
          </tr>
          @php $i++; @endphp

          <div class="modal fade" id="{{ 'edit_modal_'.$category->id }}" tabindex="-1" aria-labelledby="edit_modalLabel"
            aria-hidden="true">
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
                      <label for="edit_category" class="visually-hidden">Add
                        Category</label>
                      {{-- <div class="col-auto">
                        <input type="text" class="form-control @error('edit_category') is-invalid @enderror"
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
                      </div> --}}
                      <div class="">
                        <label for="edit_category_check_name">Name</label>
                        <input type="text" class="form-control my-2 @error('edit_category') is-invalid @enderror"
                          value="@if(isset($category)){{ $category->name }}@else{{ old('edit_category')}}@endif"
                          id="edit_category_check_name" name="{{ 'edit_category_name_'.$category->id }}"
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

                      <div class="">
                        <label for="edit_category_check_slug">Slug</label>
                        <input type="text" name="{{ 'edit_category_slug_'.$category->id }}"
                          id="edit_category_check_slug"
                          class="form-control my-2 @error('category_slug')is-invalid @enderror"
                          value="@if(isset($category)){{ $category->slug }}@else{{ old('edit_category')}}@endif"
                          required>

                        @error('category_slug')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="">
                        <label for="edit_category_check_dsc">Description</label>
                        <input type="text" name="{{ 'edit_category_dsc_'.$category->id }}" id="edit_category_check_dsc"
                          class="form-control my-2 @error('category_dsc')is-invalid @enderror"
                          value="@if(isset($category)){{ $category->description }}@else{{ old('edit_category')}}@endif"
                          required>

                        @error('category_dsc')
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
          @else
          <div>
            <h5>No categories exist!</h5>
          </div>
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection