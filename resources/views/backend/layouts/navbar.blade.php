<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
  <nav class="navbar bg-light navbar-light">
    <a href="{{ url('/') }}" class="navbar-brand mx-4 mb-3">
      <h4 class="text-primary"><i class="fa fa-hashtag me-2"></i>{{ website()->site_name }}</h4>
    </a>
    <div class="d-flex align-items-center ms-4 mb-4">
      <div class="position-relative">
        <img class="rounded-circle" src="{{ url('/').Auth::user()->photo_path }}" alt="{{ Auth::user()->photo_name }}" style="width: 50px; height: 50px;">
        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
        </div>
      </div>
      @guest
      @else
      <div class="ms-3">
        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
        <span>Admin</span>
      </div>
      @endguest
    </div>
    <div class="navbar-nav w-100">
      <a href="{{ route('dashboard') }}" class="nav-item nav-link @stack('dashboard-active')"><i
          class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
      <a href="{{ url('/') }}" class="nav-item nav-link"><i class="fa fa-newspaper me-2"></i>Visit Site</a>
      <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle @stack('post-active')" data-bs-toggle="dropdown"><i
            class="far fa-file-alt me-2"></i>Posts</a>
        <div class="dropdown-menu bg-transparent border-0">
          <a href="{{ route('add_post') }}" class="dropdown-item @stack('add-post-active')">Add Post</a>
          <a href="{{ route('view_post') }}" class="dropdown-item @stack('all-post-active')">All Posts</a>
        </div>
      </div>
      <a href="{{ route('view_category') }}" class="nav-item nav-link @stack('category-active')"><i
          class="fa fa-list-alt me-2"></i>Catrgories</a>

      <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle @stack('contacts-active')" data-bs-toggle="dropdown"><i
            class="far fa-file-alt me-2"></i>Contacts</a>
        <div class="dropdown-menu bg-transparent border-0">
          <a href="{{ route('all_contacts') }}" class="dropdown-item @stack('all-contacts-active')">All Contacts</a>
        </div>
      </div>

      <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle @stack('users-active')" data-bs-toggle="dropdown"><i class="fa fa-users" aria-hidden="true"></i>Users</a>
        <div class="dropdown-menu bg-transparent border-0">
          <a href="{{ route('all_users') }}" class="dropdown-item @stack('all_users-active')">Users List</a>
        </div>
      </div>

      <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle @stack('settings-active')" data-bs-toggle="dropdown"><i
            class="fa-solid fa-gears me-2"></i>Settings</a>
        <div class="dropdown-menu bg-transparent border-0">
          <a href="{{ route('general_settings') }}" class="dropdown-item @stack('general-settings-active')">General</a>
          <a href="{{ route('social_settings') }}" class="dropdown-item @stack('social-settings-active')">Social</a>
        </div>
      </div>
    </div>
  </nav>
</div>
<!-- Sidebar End -->


<!-- Content Start -->
<div class="content">
  <!-- Navbar Start -->
  <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
      <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
      <i class="fa fa-bars"></i>
    </a>
    <form class="d-none d-md-flex ms-4">
      <input class="form-control border-0" type="search" placeholder="Search">
    </form>
    <div class="navbar-nav align-items-center ms-auto">
      @guest
      @else
      <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
          <img class="rounded-circle me-lg-2" src="{{ url('/').Auth::user()->photo_path }}" alt="{{ Auth::user()->photo_name }}"
            style="width: 40px; height: 40px;">
          <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
          <a href="{{ route('profile') }}" class="dropdown-item">My Profile</a>
          <a href="{{ route('profile_settings') }}" class="dropdown-item">Settings</a>
          <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </div>
      @endguest
    </div>
  </nav>
  <!-- Navbar End -->