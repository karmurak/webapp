@extends('layouts.appuser')
@section('content')
@include('layouts.partials.carousel',['dtCarousleImages' => $dtCarousleImages, 'mbCarousleImages' => $mbCarousleImages])
  <div class="container">
    <img src="images/tkUl8fPnYajcxroizmqgXTe0M3A741zLNdSDfnY5.png" class="img-fluid" alt="..." />

    <div class="td-mini-mgr-top overflow-hidden text-center mb-4">
      <div class="row gy-2">
        <div class="col-4">
          <div class="bg-light tg-round-br border p-3">
            Custom column padding
          </div>
        </div>
        <div class="col-4">
          <div class="bg-light tg-round-br border p-3">
            Custom column padding
          </div>
        </div>
        <div class="col-4">
          <div class="bg-light tg-round-br border p-3">
            Custom column padding
          </div>
        </div>
        <div class="col-4">
          <div class="bg-light tg-round-br border p-3">
            Custom column padding
          </div>
        </div>
        <div class="col-4">
          <div class="bg-light tg-round-br border p-3">
            Custom column padding
          </div>
        </div>
        <div class="col-4">
          <div class="bg-light tg-round-br border p-3">
            Custom column padding
          </div>
        </div>
      </div>
    </div>

    <!-- cards list -->
    <ul class="movielist clearfix">
      <li>
        <a class="movie_thumb lazyload demo1" href="playvideo.html">
          <span class="play hidden_xs"></span>
          <span class="badge rounded-pill text-bg-info">Info</span>
          <span class="badge rounded-pill text-bg-warning">31</span>
        </a>
        <h1>movie title</h1>
      </li>
      <li>
        <a class="movie_thumb demo2">
          <span class="play hidden_xs"></span>
          <span class="badge rounded-pill text-bg-info">Info</span>
          <span class="badge rounded-pill text-bg-warning">8</span>
        </a>
        <h1>movie title</h1>
      </li>
      <li>
        <a class="movie_thumb demo3">
          <span class="play hidden_xs"></span>
          <span class="badge rounded-pill text-bg-info">Info</span>
          <span class="badge rounded-pill text-bg-warning">22</span>
        </a>
        <h1>movie title</h1>
      </li>
      <li>
        <a class="movie_thumb demo4">
          <span class="play hidden_xs"></span>
          <span class="badge rounded-pill text-bg-info">Info</span>
          <span class="badge rounded-pill text-bg-warning">13</span>
        </a>
        <h1>movie title</h1>
      </li>
      <li>
        <a class="movie_thumb lazyload demo1">
          <span class="play hidden_xs"></span>
          <span class="badge rounded-pill text-bg-info">Info</span>
          <span class="badge rounded-pill text-bg-warning">31</span>
        </a>
        <h1>movie title</h1>
      </li>
      <li>
        <a class="movie_thumb demo2">
          <span class="play hidden_xs"></span>
          <span class="badge rounded-pill text-bg-info">Info</span>
          <span class="badge rounded-pill text-bg-warning">8</span>
        </a>
        <h1>movie title</h1>
      </li>
      <li>
        <a class="movie_thumb"></a>
        <h1>movie title</h1>
      </li>
      <li>
        <a class="movie_thumb"></a>
        <h1>movie title</h1>
      </li>
      <li>
        <a class="movie_thumb"></a>
        <h1>movie title</h1>
      </li>
      <li>
        <a class="movie_thumb"></a>
        <h1>movie title</h1>
      </li>
      <li>
        <a class="movie_thumb"></a>
        <h1>movie title</h1>
      </li>
      <li>
        <a class="movie_thumb"></a>
        <h1>movie title</h1>
      </li>
      <li>
        <a class="movie_thumb"></a>
        <h1>movie title</h1>
      </li>
      <li>
        <a class="movie_thumb"></a>
        <h1>movie title</h1>
      </li>
    </ul>
    <!-- #cards list -->

    <!-- pagination -->
    <nav aria-label="..." class="pagicontainer td-medium-mgr-top mb-5">
      <ul class="pagination">
        <li class="page-item disabled">
          <a class="page-link">Previous</a>
        </li>
        <li class="page-item">
          <a class="page-link">1</a>
        </li>
        <li class="page-item active" aria-current="page">
          <a class="page-link">2</a>
        </li>
        <li class="page-item">
          <a class="page-link">3</a>
        </li>
        <li class="page-item"><a class="page-link">4</a></li>
        <li class="page-item" aria-current="page">
          <a class="page-link">5</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">6</a></li>
        <li class="page-item">
          <a class="page-link">Next</a>
        </li>
      </ul>
    </nav>
    <!-- #pagination -->
  </div>
@endsection
