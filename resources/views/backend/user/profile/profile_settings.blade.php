@extends('backend.user.layouts.main')
@push('title')Profile @endpush
@push('dashboard-active')active @endpush
@section('content')
@include('backend.user.layouts.navbar')

<div class="container-fluid">
    
    <div class="card p-2 m-2" style="box-shadow: 0 0 7px #0002;">
        <a href="{{ route('user_profile_update') }}">General settings</a>
        <p>To change your basic user informations go here.</p>
    </div>
    <div class="card p-2 m-2" style="box-shadow: 0 0 7px #0002;">
        <a href="{{ route('user_change_password') }}">Change password</a>
        <p>To change your user password go here.</p>
    </div>

</div>

@endsection