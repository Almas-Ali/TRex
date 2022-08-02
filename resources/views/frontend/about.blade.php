@extends('frontend.layouts.main')
@push('title')About @endpush
@push('about-active')active @endpush

@section('content')
@include('frontend.layouts.navbar')

<div class="container-fluid">
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