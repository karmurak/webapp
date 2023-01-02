<div class="container-fluid bg-dark border-bottom topnav">
  <div class="container">
    <header class="d-flex align-items-center justify-content-center justify-content-md-between flex-wrap py-3">
      <a href="/" class="d-flex align-items-center col-md-3 mb-md-0 text-dark text-decoration-none logo">
      </a>

      <ul class="nav col-md-auto justify-content-center mb-md-0 top">
        <li class="{{ (Request::segment(1) == '' || Request::segment(1) == 'login') ? 'active' : '' }}">
          <a href={{ route('/') }} class="nav-link link-light px-4">Home</a>
        </li>
        <li class="{{ Request::segment(1) == 'features' ? 'active' : '' }}">
          <a href={{ route('features') }} class="nav-link link-secondary px-4">Features</a>
        </li>
        <li>
          <a href="#" class="nav-link link-secondary px-4">Pricing</a>
        </li>
        <li><a href="#" class="nav-link link-secondary px-4">FAQs</a></li>
        <li><a href="#" class="nav-link link-secondary px-4">About</a></li>
      </ul>

      <div class="col-md-2 menuicons text-end">
        {{-- <a><i class="bi bi-bar-chart"></i></a> --}}
        @guest
          @if (Route::has('login'))
            <a class="textgrey" href="{{ route('login') }}">{{ __('Login') }}</a>&nbsp;
          @endif
          @if (Route::has('register'))
            <a class="textgrey" href="{{ route('register') }}">{{ __('Register') }}</a>
          @endif
        @else
          <a id="navbarDropdown" class="nav-link dropdown-toggle textgrey" href="#" role="button"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
          </a>

          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item textgrey" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        @endguest
      </div>
    </header>
  </div>
  <div class="secnav">
    <div class="container">
      <nav class="navbar">
        <button class="navbar-toggler showme" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          <span class="text">Movie Categories</span>
        </button>
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
          aria-labelledby="offcanvasWithBothOptionsLabel">
          <div class="offcanvas-header bg-light">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">
              CATEGORIES
            </h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
              aria-label="Close"></button>
          </div>

          <div class="offcanvas-body bg-dark">
            <p>
              <span class="badge bg-primary">Family Movie</span>
              <span class="badge bg-secondary">Secondary</span>
              <span class="badge bg-success">Scientic</span>
              <span class="badge bg-danger">Horror</span>
              <span class="badge bg-warning text-dark">18+</span>
              <span class="badge bg-info text-dark">Info</span>
              <span class="badge bg-light text-dark">Light</span>
              <span class="badge bg-dark">Adventure</span>
            </p>
          </div>
        </div>

        <form class="col-12 col-lg-auto mb-lg-0 stickysearch" role="search">
          <div class="input-group">
            <input type="text" class="form-control form-control-dark text-bg-dark" placeholder="Search"
              aria-label="Search" aria-describedby="basic-addon2" />
            <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
          </div>
        </form>
      </nav>
    </div>
  </div>
</div>
