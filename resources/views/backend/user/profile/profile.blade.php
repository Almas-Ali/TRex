@extends('frontend.layouts.main')
@push('title')Profile @endpush
@push('user_profile-active')active @endpush
@push('scripts')
    
@endpush
@section('content')
@include('frontend.layouts.navbar')
@include('backend.user.nav')

<div class="container-fluid">
    <div class="col d-flex justify-content-center">
        <div class="card my-5 shadow-lg p-3 mb-5 bg-body rounded" style="width:15rem;" align="center">
            <img src="{{ $user->photo_path }}" class="card-img-top rounded" alt="Profile Image">
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