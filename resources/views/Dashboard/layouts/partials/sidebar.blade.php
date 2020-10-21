<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="">PPU</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="">PPU</a>
    </div>
    <ul class="sidebar-menu">

        <li class=""><a class="nav-link " href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
        <li class="menu-header">Autentikasi</li>
        <li  class="{{  Route::currentRouteNamed('dashboard.user.index') ? 'active' : ''  }}"><a class="nav-link" href="{{ route('dashboard.user.index') }}"><i class="fa fa-users" aria-hidden="true"></i>
Manajemen User</a></li>
        <li class="menu-header">Manajemen Konten</li>
        {{-- <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="">Users</a></li>
            <li><a class="nav-link " href="">Roles</a></li>
          </ul>
        </li> --}}
        
        
        <ul class="dropdown-menu" style="display: none;">
          <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
          <li class=""><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
          
        </ul>
        
        <li class="nav-item dropdown {{  Route::currentRouteNamed('dashboard.sambutan.index','dashboard.struktur.index','dashboard.sejarah.index','dashboard.pelayanan.index', 'dashboard.info-terkini.index', 'dashboard.link.index','dashboard.faq.index'  ) ? 'active' : ''  }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-signature"></i> <span>Tentang Database PPU</span></a>
          <ul class="dropdown-menu">
            <li class="{{  Route::currentRouteNamed('dashboard.sambutan.index') ? 'active' : ''  }}"><a class="nav-link " href="{{ route('dashboard.sambutan.index') }}">Kata Sambutan</a></li>
            <li class="{{  Route::currentRouteNamed('dashboard.struktur.index') ? 'active' : ''  }}"><a class="nav-link" href="{{ route('dashboard.struktur.index') }}">Struktur Organisasi</a></li>
            <li class="{{  Route::currentRouteNamed('dashboard.sejarah.index') ? 'active' : ''  }}"><a class="nav-link" href="{{ route('dashboard.sejarah.index') }}">Sejarah Database PPU</a></li>
            <li class="{{  Route::currentRouteNamed('dashboard.pelayanan.index') ? 'active' : ''  }}"><a class="nav-link" href="{{ route('dashboard.pelayanan.index') }}">Standar Pelayanan PPU</a></li>
            <li class="{{  Route::currentRouteNamed('dashboard.info-terkini.index') ? 'active' : ''  }}"><a class="nav-link" href="{{ route('dashboard.info-terkini.index') }}">Info Terkini</a></li>
            <li class="{{  Route::currentRouteNamed('dashboard.link-terkait.index') ? 'active' : ''  }}"><a class="nav-link" href="{{ route('dashboard.link.index') }}">Link Terkait</a></li>
            <li class=" {{  Route::currentRouteNamed('dashboard.faq.index') ? 'active' : ''  }}"><a class="nav-link" href="{{ route('dashboard.faq.index') }}">FAQ</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown  {{  Route::currentRouteNamed('dashboard.regulasi.index','dashboard.dokumen-pembangunan.index','dashboard.kajian.index') ? 'active' : ''  }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-newspaper"></i> <span>Publikasi</span></a>
          <ul class="dropdown-menu">
            <li class=" {{  Route::currentRouteNamed('dashboard.regulasi.index') ? 'active' : ''  }}"><a class="nav-link" href="{{ route('dashboard.regulasi.index') }}">Regulasi</a></li>
            <li class=" {{  Route::currentRouteNamed('dashboard.dokumen-pembangunan.index') ? 'active' : ''  }}"><a class="nav-link" href="{{ route('dashboard.dokumen-pembangunan.index') }}">Dokumen Pembangunan</a></li>
            <li class=" {{  Route::currentRouteNamed('dashboard.kajian.index') ? 'active' : ''  }}"><a class="nav-link" href="{{ route('dashboard.kajian.index') }}">Kajian</a></li>
            
          </ul>
        </li>
        
        <li  class="{{  Route::currentRouteNamed('dashboard.kontak.index') ? 'active' : ''  }}"><a class="nav-link" href="{{ route('dashboard.kontak.index') }}"><i class="fas fa-address-book"></i>Kontak</a></li>
        <li  class="{{  Route::currentRouteNamed('dashboard.link-menu.index') ? 'active' : ''  }}"><a class="nav-link" href="{{ route('dashboard.link-menu.index') }}"><i class="fas fa-address-book"></i>Link Menu</a></li>
        {{-- <li><a class="nav-link {{ Route::currentRouteNamed('admin.tag.index') ? 'active' : '' }}" href="{{ route('admin.tag.index') }}"><i class="far fa-list-alt"></i> <span>Tag</span></a></li> --}}
      </ul>
      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Halaman Utama
        </a>
      </div>
  </aside>
