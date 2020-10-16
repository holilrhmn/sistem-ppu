<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-alpha.7
* @link https://github.com/tabler/tabler
* Copyright 2018-2019 The Tabler Authors
* Copyright 2018-2019 codecalm.net Paweł Kuna
* Licensed under MIT (https://tabler.io/license)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Teras PPU -</title>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <meta name="msapplication-TileColor" content="#206bc4"/>
    <meta name="theme-color" content="#206bc4"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="mobile-web-app-capable" content="yes"/>
    <meta name="HandheldFriendly" content="True"/>
    <meta name="MobileOptimized" content="320"/>
    <meta name="robots" content="noindex,nofollow,noarchive"/>
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon"/>
    <!-- CSS files -->
    <link href="{{ asset('assets/frontend/tabler-dev/dist/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/frontend/tabler-dev/dist/css/demo.min.css') }}" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/d59806f883.js" crossorigin="anonymous"></script>
    <style>
      body {
      	display: none;
      }
    </style>
  </head>
  <body class="antialiased">
    <div class="page">
      <header class="navbar navbar-expand-md navbar-light">
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a href="." class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pr-0 pr-md-3">
            <img src="./static/logo.svg" alt="" class="navbar-brand-image"><h1>TERAS PPU</h1>
          </a>
          
        </div>
      </header>
      <div class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar navbar-light">
            <div class="container-xl">
              <ul class="navbar-nav">
                <li class="nav-item {{  Route::currentRouteNamed('homepage') ? 'active' : ''  }}">
                  <a class="nav-link" href="/" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Beranda
                    </span>
                  </a>
                </li>
                <li class="nav-item  dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-base" data-toggle="dropdown" role="button" aria-expanded="false" >
                    <span class="nav-link d-md-none d-lg-inline-block"><i class="fas fa-file-invoice"></i>
                    </span>
                    <span class="nav-link-title">
                     Tentang Database PPU
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-columns  dropdown-menu-columns-2">
                    <li >
                      <a class="dropdown-item" href="/sambutan" >
                        Kata Sambutan Organisasi
                      </a>
                    </li>
                    <li >
                      <a class="dropdown-item " href="/struktur-organisasi" >
                        Struktur Organisasi
                      </a>
                    </li>
                    <li >
                      <a class="dropdown-item" href="/sejarah" >
                        Sejarah Database PPU
                      </a>
                    </li>
                    <li >
                      <a class="dropdown-item" href="/standar-pelayanan" >
                        Standar Pelayanan Database PPU
                      </a>
                    </li>
                    <li >
                      <a class="dropdown-item" href="/info-terkini" >
                        Info Terkini
                      </a>
                    </li>
                    <li >
                      <a class="dropdown-item" href="/link-terkait" >
                        Link Terkait
                      </a>
                    </li>
                    <li >
                      <a class="dropdown-item" href="/faq" >
                        FAQ
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item  dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-base" data-toggle="dropdown" role="button" aria-expanded="false" >
                    <span class="nav-link d-md-none d-lg-inline-block"><i class="fas fa-file-alt"></i>
                    </span>
                    <span class="nav-link-title">
                     Publikasi
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu  dropdown-menu">
                    <li >
                      <a class="dropdown-item" href="/regulasi" >
                        Regulasi
                      </a>
                    </li>
                    <li >
                      <a class="dropdown-item" href="/dokumen-pembangunan" >
                        Dokumen Pembangunan
                      </a>
                    </li>
                    <li >
                      <a class="dropdown-item" href="/kajian" >
                        Kajian
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/kontak" >
                    <span class="nav-link d-md-none d-lg-inline-block"><i class="fas fa-address-book"></i>
                    </span>
                    <span class="nav-link-title">
                      Kontak
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./form-elements.html" >
                    <span class="nav-link d-md-none d-lg-inline-block"><i class="fas fa-chart-bar"></i>
                    </span>
                    <span class="nav-link-title">
                      Statistik Tabular
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('map') }}" >
                    <span class="nav-link d-md-none d-lg-inline-block"><i class="fas fa-map-marked-alt"></i>
                    </span>
                    <span class="nav-link-title">
                      Informasi Spasial
                    </span>
                  </a>
                
              </ul>
              
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="container-xl d-flex justify-content-center">
          <div class="card shadow text-center" style="width:50rem; height:15rem;">
            <div class="card-body">
              <h5 class="card-title text-center">TERAS PPU</h5>
              <div class="form-group">
                <label  for="exampleFormControlSelect1"> Data Tempat Sampah</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>Data Armada 1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
              <div class="form-group">
                <input type="submit" value="Cari" class="btn btn-primary mt-3">
            </div>
            </div>
          </div>
        </div>
        <footer class="footer footer-transparent">
          <div class="container">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-lg-auto ml-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item"><a href="./docs/index.html" class="link-secondary">Documentation</a></li>
                  <li class="list-inline-item"><a href="./faq.html" class="link-secondary">FAQ</a></li>
                  <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary">Source code</a></li>
                </ul>
              </div>
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                Copyright © 2020
                <a href="." class="link-secondary">Tabler</a>.
                All rights reserved.
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- Libs JS -->
    <script src="{{ asset('assets/frontend/tabler-dev/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Tabler Core -->
    <script src="{{ asset('assets/frontend/tabler-dev/dist/js/tabler.min.js') }}"></script>
    <script>
      document.body.style.display = "block"
    </script>
  </body>
</html>