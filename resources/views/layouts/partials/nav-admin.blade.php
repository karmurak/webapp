<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top admin">
  <div class="container-fluid">
    <header>
      <a href="/" class="d-flex align-items-center col-md-3 mb-md-0 text-dark text-decoration-none logo">
      </a>
    </header>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03" style="margin-left: 2rem">
      <ul class="navbar-nav me-auto mb-lg-0 mb-2">
        <li class="nav-item">
          <a href="/admin/home" class="nav-link {{Request::segment(2) == 'home' ? 'active' : ''}}" aria-current="page">
            Dashboard
          </a>
        </li>
        <li>
          <a href="/admin/upload-img" class="nav-link {{Request::segment(2) == 'upload-img' || Request::segment(2) == 'edit-img' ? 'active' : ''}}" aria-current="page">
            Carousel
          </a>
        </li>
        <li>
          <a href="/admin/uploadmulti" class="nav-link {{Request::segment(2) == 'uploadmulti' ? 'active' : ''}}">
            BannerAds
          </a>
        </li>
        <li>
          <a href="/admin/category" class="nav-link {{Request::segment(2) == 'category' ? 'active' : ''}}">
            Category
          </a>
        </li>
      </ul>
    </div>

    <div class="col-md-2 menuicons text-end">
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
</nav>
