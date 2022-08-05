@extends('frontend.layouts.main')
@push('title')Categories @endpush
@push('categories-active')active @endpush
@push('scripts')
<meta name="description" content="Categories info of {{ website()->site_name }}">
<link rel="canonical" href="{{ route('list_category') }}">
<meta property="og:locale" content="en_US">
<meta property="og:type" content="Categories">
<meta property="og:title" content="Categories - {{ website()->site_name }}">
<meta property="og:description" content="Categories info of {{ website()->site_name }}">
<meta property="og:url" content="{{ route('privacy_policy') }}">
<meta property="og:site_name" content="{{ website()->site_name }}">
<meta property="og:image" content="{{ url('/').'/img/trex-01.png' }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Categories - {{ website()->site_name }}">
<meta name="twitter:description" content="Categories info of {{ website()->site_name }}">
<meta name="twitter:image" content="{{ url('/').'/img/trex-01.png' }}">
<meta name="description" content="Categories info of {{ website()->site_name }}">
@endpush
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
            <td>
              <a href="{{ route('single_category', ['slug' => $category->slug]) }}" class="text-dark">
                {{ $category->name }}
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@include('frontend.layouts.footer')

@endsection