@extends('backend.layouts.main')
@push('title')Profile @endpush
@push('dashboard-active')active @endpush

@section('content')
@include('backend.layouts.navbar')


<div class="container-fluid">
    <div class="container mt-3">
        @if(isset($message))
        <p class="alert alert-success">{{ $message }}</p>
        @endif

        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    </div>
    <form action="{{ route('update_profile') }}" method="POST" class="p-2">
        @csrf
        <div class="form-control">
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control my-2" value="{{ $user->name }}" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control my-2" value="{{ $user->email }}"
                    required>
            </div>
            {{-- <div>
                <label for="user_image">Photo</label>
                <input type="file" id="user_image" name="user_image" class="form-control my-2" value="">
            </div> --}}
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
</div>



@endsection