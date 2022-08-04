@extends('frontend.layouts.main')
@push('title')About @endpush
@push('about-active')active @endpush
@push('scripts')
<meta name="description" content="About info of {{ website()->site_name }}">
<link rel="canonical" href="{{ route('about') }}">
<meta property="og:locale" content="en_US">
<meta property="og:type" content="About">
<meta property="og:title" content="About - {{ website()->site_name }}">
<meta property="og:description" content="About info of {{ website()->site_name }}">
<meta property="og:url" content="{{ route('privacy_policy') }}">
<meta property="og:site_name" content="{{ website()->site_name }}">
<meta property="og:image" content="{{ url('/').'/img/trex-01.png' }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="About - {{ website()->site_name }}">
<meta name="twitter:description" content="About info of {{ website()->site_name }}">
<meta name="twitter:image" content="{{ url('/').'/img/trex-01.png' }}">
<meta name="description" content="About info of {{ website()->site_name }}">
@endpush
@section('content')
@include('frontend.layouts.navbar')

<div class="container">
    <div class="card my-3 p-2">
        <h1 class="text-center fw-semibold">About us</h1>
        <p class="fw-lighter">Trex is a CMS developed for education purpose. We have built this to help people who wants to host there
            contents
            for free. You can make a website easy with our CMS TRex.
            <br><br>
            Thanks for choosing our CMS for your blog site.
            <br>
            Thankfully <strong>TRex Team</strong>
        </p>
    </div>
</div>

@include('frontend.layouts.footer')

@endsection