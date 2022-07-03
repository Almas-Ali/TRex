@extends('backend.layouts.main')
@push('title')Settings @endpush
@push('settings-active')active @endpush
@push('general-settings-active')active @endpush
@push('scripts')
@endpush
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
    <form action="{{ route('save_general') }}" method="POST" class="p-2">
        @csrf
        <div class="form-control">
            <div>
                <label for="site_name">Site name</label>
                <input type="text" id="site_name" name="site_name" class="form-control my-2"
                    value="{{ $settings->site_name }}">
            </div>
            <div>
                <label for="site_slogan">Site slogan</label>
                <input type="text" id="site_slogan" name="site_slogan" class="form-control my-2"
                    value="{{ $settings->site_slogan }}">
            </div>
            <div>
                <label for="site_author_name">Site author name</label>
                <input type="text" id="site_author_name" name="site_author_name" class="form-control my-2"
                    value="{{ $settings->site_author_name }}">
            </div>
            <div>
                <label for="site_author_email">Site author email</label>
                <input type="email" id="site_author_email" name="site_author_email" class="form-control my-2"
                    value="{{ $settings->site_author_email }}">
            </div>
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

@endsection