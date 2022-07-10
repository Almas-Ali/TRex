@extends('backend.installation.layouts')
@push('title')Installation @endpush
@section('content')
<div class="container">
  <div align="center">
    <h1 class="mt-2">Installation of TRex</h1>

    <div class="trex-img-container">
      <img class="trex-img" src="{{ url('/').'/img/trex-03.png' }}" alt="Baby TRex">
    </div>
    <div class="details">
      <h5>Baby Trex is just born. Welcome him by setuping Database. This will be his home.</h5>
      <h6 class="card-subtitle mb-2 text-muted">To use TRex you need to configure some settings first.</h6>
    </div>
    <a class="btn btn-primary btn-lg mt-2" href="{{ route('db_connection') }}">Get Started!</a>
  </div>
</div>
@endsection