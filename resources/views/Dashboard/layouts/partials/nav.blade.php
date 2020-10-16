<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      </ul>
    </form>
    <ul class="navbar-nav navbar-right">

      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        
        <figure class="avatar mr-2 avatar-sm bg-info text-white" data-initial="{{substr (Auth::user()->name, 0,1) }}" ></figure>
        <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          {{-- <div class="dropdown-title">Logged in 5 min ago</div> --}}
          <a href="{{ route('dashboard.edit.profil') }}" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
          </a>
          {{-- <a href="features-activities.html" class="dropdown-item has-icon">
            <i class="fas fa-bolt"></i> Activities
          </a> --}}
          {{-- <a href="features-settings.html" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Settings
          </a> --}}
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();

          document.getElementById('logout-form').submit();">

          {{ __('Logout') }}
            <i class="fas fa-sign-out-alt"></i>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

            @csrf

            </form>
        </div>
      </li>
    </ul>
  </nav>
