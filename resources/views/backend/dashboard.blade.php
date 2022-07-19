@extends('backend.layouts.main')
@push('title')Dashboard @endpush
@push('dashboard-active')active @endpush
@push('scripts')
@endpush
@section('content')

<div class="container-fluid position-relative bg-white d-flex p-0">
    {{--
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End --> --}}

    @include('backend.layouts.navbar')


    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-3">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Welcome {{ Auth::user()->name }},</h6>
            </div>

            <div>
                <p>
                    All your site status is here. You can simply monitor all your site activity from this dashboard. TRex is very simple to use with many powerfull pre build tools for our users. Feel free to use our tool in your site for free.
                </p>
            </div>
        </div>
    </div>


    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Categories</p>
                        <h6 class="mb-0">{{ $total_posts }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="far fa-file-alt fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Posts</p>
                        <h6 class="mb-0">{{ $total_categories }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Visitors</p>
                        <h6 class="mb-0">95987</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Revenue</p>
                        <h6 class="mb-0">$595.87</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @endsection