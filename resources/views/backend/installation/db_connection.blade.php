@extends('backend.installation.layouts')
@push('title')Database Setup @endpush
@section('content')
<div class="container">
    <div align="center">
        <h1 class="mt-2">Database setup for TRex</h1>

        <form action="{{ route('db_connection_submit') }}" method="POST">
            @csrf
            <div class="db_form">
                <div class="form-group">
                    <input type="text" class="form-control my-3" placeholder="Database Host" name="db_host" value="localhost" required>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control my-3" placeholder="Database Port" name="db_port" value="3306" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control my-3" placeholder="Database Name" name="db_name" value="TRex" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control my-3" placeholder="Database Username" value="root" name="db_username" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control my-3" placeholder="Database Password" value="" name="db_password" required>
                </div>
            </div>
            <button class="btn btn-primary btn-lg w-25">Submit</button>
        </form>
    </div>
</div>
@endsection