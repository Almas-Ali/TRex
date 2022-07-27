@extends('backend.layouts.main')
@push('title')Profile @endpush
@push('dashboard-active')active @endpush

@section('content')
@include('backend.layouts.navbar')

<style>

</style>

<div class="container-fluid">
    <div class="col d-flex justify-content-center">
        <div class="card my-5 shadow-lg p-3 mb-5 bg-body rounded" style="width:20rem;" align="center">
            <img src="{{ url('/') . '/img/badge.png' }}" class="card-img-top" alt="Profile Image">
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted ">{{ $user->email }}</h6>
                <p class="card-text">
                <div class="col-sm-6">
                    <h6>Total Posts</h6>
                    {{ $posts }}
                </div>
                </p>
            </div>
        </div>
    </div>
</div>


<script>

</script>
@endsection