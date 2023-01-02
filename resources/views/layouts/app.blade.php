@include('layouts.partials.header')
@if (Request::segment(1) == 'admin')
  @include('layouts.partials.nav-admin')
@else
  @include('layouts.partials.nav')
@endif

<main class="container-fluid">
  @yield('content')
</main>

@if (Request::segment(1) == 'admin')
  @include('layouts.partials.footer-admin')
@else
  @include('layouts.partials.footer')
@endif
