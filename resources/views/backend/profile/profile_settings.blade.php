@extends('backend.layouts.main')
@push('title')Profile @endpush
@push('dashboard-active')active @endpush
@push('scripts')
<style>
    .hidden {
        display: none;
    }
</style>
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
    <form action="{{ route('update_profile') }}" method="POST" class="p-2" enctype="multipart/form-data">
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
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control my-2"
                    value="{{ $user->username }}">
                <small class="text-muted text-dark mb-2">Username should be unique !</small>
            </div>
            <div class="row">
                <div class="col-md-8" id="pto">
                    <label for="user_image">Photo</label>
                    <input type="file" id="user_image" name="user_image"
                        class="@error('image') is-invalid @enderror form-control my-2" onchange="loadFile(event)">
                    @error('image')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <img id="output" style="width: 20rem;" class="mt-3 shadow-lg p-3 mb-5 bg-body rounded hidden"> <br>
                    <script>
                        var loadFile = function(event) {
                            var output = document.getElementById('output');
                            var pto = document.getElementById('pto');
                            pto.style = "margin-top: 84px";
                            output.classList.remove('hidden');
                            output.src = URL.createObjectURL(event.target.files[0]);
                            output.onload = function() {
                            URL.revokeObjectURL(output.src) // free memory
                            }
                        };
                    </script>
                </div>
            </div>
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
</div>



@endsection