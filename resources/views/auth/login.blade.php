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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

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
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                        old('remember') ? 'checked' : '' }}>

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
                <input id="user-email" class="form-content @error('email') is-invalid @enderror" type="email"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                        ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    <legend id="forgot-pass">{{ __('Forgotten password?') }}</legend>
                </a>
                @endif

                <input id="submit-btn" type="submit" name="submit" value="{{ __('Login') }}" />

                <a href="{{ route('register') }}" id="signup">Don't have account yet?</a>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<style>
    a {
        text-decoration: none;
    }

    body {
        background: -webkit-linear-gradient(bottom, #12D8FA, #1FA2FF);
        background-repeat: no-repeat;
    }

    label {
        font-family: "Raleway", sans-serif;
        font-size: 11pt;
    }

    #forgot-pass {
        color: #12D8FA;
        font-family: "Raleway", sans-serif;
        font-size: 10pt;
        margin-top: 3px;
        text-align: right;
    }

    #card {
        background: #fbfbfb;
        border-radius: 8px;
        box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
        height: 475px;
        margin: 6rem auto 8.1rem auto;
        width: 340px;
    }

    #card-content {
        padding: 12px 44px;
    }

    #card-title {
        font-family: "Raleway Thin", sans-serif;
        letter-spacing: 4px;
        padding-bottom: 23px;
        padding-top: 13px;
        text-align: center;
    }

    #signup {
        color: #12D8FA;
        font-family: "Raleway", sans-serif;
        font-size: 10pt;
        margin-top: 16px;
        text-align: center;
    }

    #submit-btn {
        background: -webkit-linear-gradient(right, #1FA2FF, #12D8FA);
        border: none;
        border-radius: 21px;
        box-shadow: 0px 1px 8px #999999;
        cursor: pointer;
        color: white;
        font-family: "Raleway SemiBold", sans-serif;
        height: 42.3px;
        margin: 0 auto;
        margin-top: 10px;
        transition: 0.25s;
        width: 153px;
    }

    #submit-btn:hover {
        box-shadow: 0px 1px 18px #999999;
    }

    .form {
        align-items: left;
        display: flex;
        flex-direction: column;
    }

    .form-border {
        background: -webkit-linear-gradient(right, #1FA2FF, #12D8FA);
        height: 1px;
        width: 100%;
    }

    .form-content {
        background: #fbfbfb;
        border: none;
        outline: none;
        padding-top: 14px;
    }

    .underline-title {
        background: -webkit-linear-gradient(right, #1FA2FF, #12D8FA);
        height: 2px;
        margin: -1.1rem auto 0 auto;
        width: 89px;
    }
</style>
@endpush

@endsection