@include('Dashboard.layouts.partials.head')
<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      @include('Dashboard.layouts.partials.nav')
      <div class="main-sidebar">
        @include('Dashboard.layouts.partials.sidebar')
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
            @yield('content')
          <div class="section-body">
          </div>
        </section>
      </div>
      @include('Dashboard.layouts.partials.footer')
    </div>
  </div>
  @include('Dashboard.layouts.partials.scripts')
  <!-- Page Specific JS File -->
</body>
</html>
