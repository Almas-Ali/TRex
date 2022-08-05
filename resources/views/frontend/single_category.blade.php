@extends('frontend.layouts.main')
@push('title')Categories @endpush
@push('categories-active')active @endpush
@push('scripts')
<meta name="description" content="{{ $category->description }} - {{ website()->site_name }}">
<link rel="canonical" href="{{ route('single_category') }}">
<meta property="og:locale" content="en_US">
<meta property="og:type" content="Category">
<meta property="og:title" content="{{ $category->name }} - {{ website()->site_name }}">
<meta property="og:description" content="{{ $category->description }} - {{ website()->site_name }}">
<meta property="og:url" content="{{ route('privacy_policy') }}">
<meta property="og:site_name" content="{{ website()->site_name }}">
<meta property="og:image" content="{{ url('/').'/img/trex-01.png' }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Category - {{ website()->site_name }}">
<meta name="twitter:description" content="{{ $category->description }} - {{ website()->site_name }}">
<meta name="twitter:image" content="{{ url('/').'/img/trex-01.png' }}">
<meta name="description" content="{{ $category->description }} - {{ website()->site_name }}">
@endpush
@section('content')
@include('frontend.layouts.navbar')

<div class="container-fluid">
  
{{ $category }}

</div>

@include('frontend.layouts.footer')

@endsection