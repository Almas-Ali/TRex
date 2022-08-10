<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
      aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Dashboard</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center">
        <li class="nav-item">
          <a class="nav-link @stack('user_dashboard-active')" aria-current="page"
            href="{{ route('user_dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @stack('user_profile-active')" aria-current="page"
            href="{{ route('user_profile') }}">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @stack('user_profile_settings-active')" aria-current="page"
            href="{{ route('user_profile_settings') }}">Settings</a>
        </li>
        <li>
          <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>

@push('scripts')
<link href="{{ asset('css/nav.css') }}" rel="stylesheet">
<script src="{{ asset('js/nav.js') }}" defer></script>
@endpush