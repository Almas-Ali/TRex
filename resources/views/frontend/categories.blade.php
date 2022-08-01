@extends('frontend.layouts.main')
@push('title')Categories @endpush
@push('categories-active')active @endpush

@section('content')
@include('frontend.layouts.navbar')

<div class="container-fluid">
  <div class="mt-3 p-2">
    <h1 class="text-center fw-semibold">Categories</h1>
    <div class="container table-responsive" align="center">
      <table class="table text-start align-middle table-bordered table-hover mb-0">
        <thead>
          <tr>
            <th>Categories list</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
          <tr>
            <td>{{ $category->name }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@include('frontend.layouts.footer')

@endsection