@extends('backend.layouts.login_layouts')
@push('title')Login @endpush
@push('login-active')active @endpush
@section('content')

{{-- <div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Login') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="row mb-3">
              <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
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
                  name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6 offset-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                    ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                  </label>
                </div>
              </div>
            </div>

            <div class="row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
                </a>
                @endif
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> --}}

<div class="container mt-5">
  <div id="card">
    <div id="card-content">
      <div id="card-title">
        <h2>LOGIN</h2>
        <div class="underline-title"></div>
      </div>
      <form method="post" action="{{ route('login') }}" class="form">
        @csrf
        <label for="user-email" style="padding-top:13px">
          &nbsp;{{ __('Email Address') }}
        </label>
        <input id="user-email" class="form-content @error('email') is-invalid @enderror" type="email" name="email"
          value="{{ old('email') }}" required autocomplete="email" autofocus>
        <div class="form-border"></div>
        @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror

        <label for="user-password" style="padding-top:15px">&nbsp;{{ __('Password') }}
        </label>
        <input id="user-password" class="form-content @error('password') is-invalid @enderror" type="password"
          name="password" required autocomplete="current-password">
        <div class="form-border"></div>
        @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div class="form-check" style="padding-top:15px">
          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked'
            : '' }}>

          <label class="form-check-label" for="remember">
            {{ __('Remember Me') }}
          </label>
        </div>

        <small class="text-muted">by sign-in, you agree to our <a href="{{ route('privacy_policy') }}">
            {{ __('Terms and Privacy Policy') }}
          </a>
        </small>

        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">
          <legend id="forgot-pass">{{ __('Forgotten password?') }}</legend>
        </a>
        @endif

        <input id="submit-btn" type="submit" name="submit" value="{{ __('Login') }}" />

        <a href="{{ route('register') }}" id="signup" style="color: green">{{ __('Don\'t have account yet?')
          }}</a>
      </form>
    </div>
  </div>
</div>

@endsection