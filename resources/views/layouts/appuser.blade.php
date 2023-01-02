@include('layouts.partials.header')
<!-- nav -->
@include('layouts.partials.nav')
<!-- #nav -->
<main class="py-4">
  @yield('content')
</main>

@include('layouts.partials.footer')
