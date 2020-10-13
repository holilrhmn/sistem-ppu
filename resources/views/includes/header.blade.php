<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top">



    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link collapsed" href="{{ route('outlet_map.index') }}">
                <span class="font-weight-bold">{{ __('menu.our_outlets') }}</span>
            </a>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        @guest
        <li class="nav-item">
            <span class="font-weight-bold"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></span>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item">
            @if (Route::has('register'))
            <span class="font-weight-bold"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></span>
            @endif
        </li>
        @else
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="font-weight-bold">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle" src="#">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        @endguest
    </ul>

</nav>
<!-- End of Topbar -->