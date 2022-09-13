@extends('backend.layouts.main')
@push('title')Profile @endpush
@push('dashboard-active')active @endpush
@section('content')
@include('backend.layouts.navbar')


<div class="container-fluid">
    <h1 align="center">Change Password</h1>
    <div class="container mt-3">
        @if(isset($message))
        <p class="alert alert-{{ session('message_type') }}">{{ $message }}</p>
        @endif

        @if (session('message'))
        <div class="alert alert-{{ session('message_type') }}">
            {{ session('message') }}
        </div>
        @endif
    </div>
    <form action="{{ route('change_password_save') }}" method="POST" class="p-2" enctype="multipart/form-data">
        @csrf
        <div class="form-control">
            <div>
                <label for="current_password">Current Password</label>
                <input type="password" id="current_password" name="current_password" class="form-control my-2" required>
            </div>
            <div>
                <label for="new_password">New Password</label>
                <input type="password" id="new_password" name="new_password" class="form-control my-2" required>
            </div>
            <div>
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control my-2" required>
            </div>
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
</div>



@endsection