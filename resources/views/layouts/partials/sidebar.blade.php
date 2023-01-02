<button class="btn btn-primary tg-offcanvasctrl" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft"
aria-controls="offcanvasLeft">Menu</button>

{{-- offcanvas --}}
<div class="offcanvas offcanvas-start show" tabindex="-1" id="offcanvasLeft" aria-labelledby="offcanvasRightLabel">
<div class="offcanvas-body text-bg-dark">
  {{-- sidebar --}}
  <div class="d-flex flex-column text-bg-dark flex-shrink-0">
    <a href="/" class="d-flex align-items-center mb-md-0 me-md-auto text-decoration-none mb-3 text-white">
      <svg class="bi pe-none me-2" width="40" height="32">
        <use xlink:href="#bootstrap"></use>
      </svg>
      <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/admin/home" class="nav-link text-white {{Request::segment(2) == 'home' ? 'active' : ''}}" aria-current="page">
          <svg class="bi pe-none me-2" width="16" height="16">
            <use xlink:href="#home"></use>
          </svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="/admin/upload-img" class="nav-link text-white {{Request::segment(2) == 'upload-img' || Request::segment(2) == 'edit-img' ? 'active' : ''}}" aria-current="page">
          <svg class="bi pe-none me-2" width="16" height="16">
            <use xlink:href="#home"></use>
          </svg>
          Image (Slider)
        </a>
      </li>
      <li>
        <a href="/admin/uploadmulti" class="nav-link text-white {{Request::segment(2) == 'uploadmulti' ? 'active' : ''}}">
          <svg class="bi pe-none me-2" width="16" height="16">
            <use xlink:href="#speedometer2"></use>
          </svg>
          Image (Ads)
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16">
            <use xlink:href="#table"></use>
          </svg>
          Orders
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16">
            <use xlink:href="#grid"></use>
          </svg>
          Products
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16">
            <use xlink:href="#people-circle"></use>
          </svg>
          Customers
        </a>
      </li>
    </ul>
  </div>
  {{-- #sidebar --}}
</div>
</div>
{{-- #offcanvas --}}
