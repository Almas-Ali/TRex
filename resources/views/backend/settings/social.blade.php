@extends('backend.layouts.main') @push('title')Settings @endpush
@push('settings-active')active @endpush @push('social-settings-active')active
@endpush @push('scripts') @endpush @section('content')
@include('backend.layouts.navbar')

<div class="container-fluid">
    <div class="container-fluid">
        <h1 align="center" class="mt-2">Social Settings</h1>
        <div class="container mt-3">
            @if(isset($message))
            <p class="alert alert-{{ $type }}">{{ $message }}</p>
            @endif @if (session('message'))
            <div class="alert alert-{{ session('type') }}">
                {{ session("message") }}
            </div>
            @endif
        </div>
        <form action="{{ route('save_social') }}" method="POST" class="p-2">
            @csrf
            <div class="form-control">
                <div>
                    <label for="phone">Phone/Mobile:</label>
                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        class="form-control my-2"
                        value="{{ $social->phone }}"
                    />
                </div>
                <div>
                    <label for="facebook">Facebook:</label>
                    <input
                        type="text"
                        id="facebook"
                        name="facebook"
                        class="form-control my-2"
                        value="{{ $social->facebook }}"
                    />
                </div>
                <div>
                    <label for="instagram">Instagram:</label>
                    <input
                        type="text"
                        id="instagram"
                        name="instagram"
                        class="form-control my-2"
                        value="{{ $social->instagram }}"
                    />
                </div>
                <div>
                    <label for="twitter">Twitter:</label>
                    <input
                        type="text"
                        id="twitter"
                        name="twitter"
                        class="form-control my-2"
                        value="{{ $social->twitter }}"
                    />
                </div>
                <div>
                    <label for="linkedin">Linkedin:</label>
                    <input
                        type="text"
                        id="linkedin"
                        name="linkedin"
                        class="form-control my-2"
                        value="{{ $social->linkedin }}"
                    />
                </div>
                
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection
