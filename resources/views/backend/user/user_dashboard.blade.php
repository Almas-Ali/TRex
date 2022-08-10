@extends('frontend.layouts.main')
@push('title')User Dashboard @endpush
@push('user_dashboard-active')active @endpush

@section('content')
@include('frontend.layouts.navbar')
@include('backend.user.nav')

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-3">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Welcome {{ Auth::user()->name }},</h6>
        </div>

        <div>
            <p>
                All your site status is here. You can simply monitor all your site activity from this dashboard.
                TRex is very simple to use with many powerfull pre build tools for our users. Feel free to use our
                tool in your site for free.
            </p>
        </div>
    </div>
</div>

@include('frontend.layouts.footer')

@endsection