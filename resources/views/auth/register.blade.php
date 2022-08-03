@extends('backend.layouts.login_layouts')
@push('title')Register @endpush
@push('register-active')active @endpush
@section('content')

{{-- <div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Register') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="row mb-3">
              <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                  value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username')
                }}</label>

              <div class="col-md-6">
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                  name="username" value="{{ old('username') }}" required autocomplete="username">

                @error('username')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Gender')
                }}</label>

              <div class="col-md-6">
                <select class="form-select @error('gender') is-invalid @enderror" aria-label="Default select example"
                  name="gender" value="{{ old('username') }}" required autocomplete="username">
                  <option selected>{{ __('Select gender') }}</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option>
                </select>
                @error('gender')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm
                Password') }}</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                  autocomplete="new-password">
              </div>
            </div>

            <div class="row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Register') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> --}}



<div class="container mt-5">
  <div id="card" style="width: 90%; max-width: 90%; height: 720px;">
    <div id="card-content">
      <div id="card-title">
        <h2>{{ __('REGISTER') }}</h2>
        <div class="underline-title" style="width: 170px;"></div>
      </div>
      <form method="post" action="{{ route('register') }}" class="form">
        @csrf

        <label for="user-email" style="padding-top:13px">
          &nbsp;{{ __('Full Name') }}
        </label>
        <input id="user-email" class="form-content @error('name') is-invalid @enderror" type="name" name="name"
          value="{{ old('name') }}" required autocomplete="name" autofocus>
        <div class="form-border"></div>
        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror

        <label for="user-email" style="padding-top:13px">
          &nbsp;{{ __('Email Address') }}
        </label>
        <input id="user-email" class="form-content @error('email') is-invalid @enderror" type="email" name="email"
          value="{{ old('email') }}" required autocomplete="email">
        <div class="form-border"></div>
        @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror

        <label for="user-email" style="padding-top:13px">
          &nbsp;{{ __('Username') }}
        </label>
        <input id="user-email" class="form-content @error('username') is-invalid @enderror" type="username"
          name="username" value="{{ old('username') }}" required autocomplete="username">
        <div class="form-border"></div>
        @error('username')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div style="padding: 18px 0;">
          <label for="user-email">
            &nbsp;{{ __('Gender') }}
          </label>
          <select class="form-select @error('gender') is-invalid @enderror" aria-label="Default select example"
            name="gender" value="{{ old('username') }}" required autocomplete="username">
            <option selected>{{ __('Select gender') }}</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
          @error('gender')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <label for="user-password" style="padding-top:15px">&nbsp;{{ __('Password') }}
        </label>
        <input id="user-password" class="form-content @error('password') is-invalid @enderror" type="password"
          name="password" required autocomplete="new-password">
        <div class="form-border"></div>
        @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror


        <label for="user-password" style="padding-top:15px">&nbsp;{{ __('Confirm Password') }}
        </label>
        <input id="user-password" class="form-content @error('password') is-invalid @enderror" type="password"
          name="password_confirmation" required autocomplete="new-password">
        <div class="form-border"></div>
        @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror

        <small class="text-muted">by sign-in, you agree to our <a href="{{ route('privacy_policy') }}">
            {{ __('Terms and Privacy Policy') }}
          </a>
        </small>

        <input class="w-75" id="submit-btn" type="submit" name="submit" value="{{ __('Register') }}">
      </form>
    </div>
  </div>
</div>

@endsection