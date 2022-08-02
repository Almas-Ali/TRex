{{-- @include('frontend.layouts.links')

<!-- Navbar starts here -->
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">{{ website()->site_name }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-dark" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="{{ url('posts') }}">Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="{{ url('about') }}">About</a>
        </li>
        <ul class="navbar-nav ms-auto">
          <!-- Authentication Links -->
          @guest
          @if (Route::has('login'))
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @endif

          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
          @endif
          @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button"
              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

              <a href="{{ route('view_post') }}" class="dropdown-item">
                Post
              </a>
              <a href="{{ route('view_category') }}" class="dropdown-item">
                Category
              </a>

              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
          @endguest
        </ul>
      </ul>
    </div>
  </div>
</nav>
<!-- Navbar ends here --> --}}

<header id="nav-wrapper">
  <nav id="nav">
    <div class="nav left">
      <span class="gradient skew">
        <h1 class="logo un-skew mt-3">
          <a href="{{ route('home') }}" class="text-light text-decoration-none">
            {{ website()->site_name }}
          </a>
        </h1>
      </span>
      <button id="menu" class="btn-nav"><span class="fas fa-bars"></span></button>
    </div>
    <div class="nav right mx-5">
      <a href="{{ route('home') }}" class="nav-link @stack('home-active')">
        <span class="nav-link-span">
          <span class="u-nav">
            <i class="fa fa-home" aria-hidden="true"></i> Home
          </span>
        </span>
      </a>
      <a href="{{ route('list_category') }}" class="nav-link @stack('categories-active')">
        <span class="nav-link-span">
          <span class="u-nav">
            <i class="fa fa-list-alt me-2"></i> Categories
          </span>
        </span>
      </a>
      <a href="{{ route('about') }}" class="nav-link @stack('about-active')">
        <span class="nav-link-span">
          <span class="u-nav">
          <i class="fa fa-info-circle" aria-hidden="true"></i> About
          </span>
        </span>
      </a>
      <a href="{{ route('contact') }}" class="nav-link @stack('contact-active')">
        <span class="nav-link-span">
          <span class="u-nav">
            <i class="fa fa-envelope" aria-hidden="true"></i> Contact
          </span>
        </span>
      </a>
      <div>
        @guest
        {{-- <a href="{{ route('login') }}" class="nav-link @stack('login-active')">
          <span class="nav-link-span">
            <span class="u-nav">{{ __('Login') }}</span>
          </span>
        </a> --}}
        <a href="{{ route('login') }}" class="btn-grad rounded text-light text-decoration-none mx-3">Login</a>

        {{-- <a href="{{ route('register') }}" class="nav-link @stack('register-active')">
          <span class="nav-link-span">
            <span class="u-nav">{{ __('Register') }}</span>
          </span>
        </a> --}}
        @else
        <a href="{{ route('dashboard') }}" class="btn-grad rounded text-light text-decoration-none mx-3">
          <i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard
        </a>

        {{-- <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link @stack('admin-active') dropdown-toggle" href="#" role="button"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
          </a>

          <div class="dropdown-menu dropdown-menu-end bg-dark rounded cnpi" aria-labelledby="navbarDropdown">

            <a href="{{ route('dashboard') }}" class="dropdown-item text-light @stack('dashboard-active')">
              Dashboard
            </a>

            <a class="dropdown-item text-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </li> --}}
        @endguest
      </div>
    </div>
  </nav>
</header>

<!-- Header Start -->
{{-- <img src="{{ url('/img/banner2.jpeg') }}" alt="Banner" class="banner"> --}}
{{-- <div class="header">
  <div class="container">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark py-2">
      <a href="#" class="navbar-brand">{{ website()->site_name }}</a>
      <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#main_navbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-between" id="main_navbar">
        <div class="navbar-nav m-auto">
          <a href="{{ route('index') }}" class="nav-item nav-link @stack('home-active')">Home</a>
          <a href="{{ route('list_category') }}" class="nav-item nav-link @stack('categories-active')">Categories</a>
          <a href="{{ route('about') }}" class="nav-item nav-link @stack('about-active')">About</a>
          <a href="{{ route('contact') }}" class="nav-item nav-link  @stack('contact-active')">Contact Us</a>

          <ul class="navbar-nav  bg-dark-50 rounded">
            <!-- Authentication Links -->
            @guest
            @if (Route::has('login'))
            <li class="nav-item">
              <a class="nav-link @stack('login-active')" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif

            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link @stack('register-active')" href="{{ route('register') }}">{{
                __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link @stack('admin-active') dropdown-toggle" href="#" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-end bg-dark rounded cnpi" aria-labelledby="navbarDropdown">

                <a href="{{ route('dashboard') }}" class="dropdown-item text-light @stack('dashboard-active')">
                  Dashboard
                </a>

                <a class="dropdown-item text-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
  </div>
</div> --}}