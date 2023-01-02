@extends('layouts.app')
@section('content')
  <div class="py-8">
    <blockquote class="blockquote">
      <h2 class="fw-bold tg-regular-fs">Upload Carousel Image</h2>
    </blockquote>

    <form action="{{ route('upload-image') }}" method="POST" enctype="multipart/form-data">
      @csrf
      @if ($message = Session::get('success'))
        {{-- <div class="alert alert-success alert-dismissible fade show mb-2" role="alert"> --}}
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ $message }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div class="mb-3">
        <img id="preview-image-before-upload" src="/uploads/default.jpg" alt="preview image" style="max-height: 100px;"
          class="card mb-3">
        <input type="file" name="image" id="inputImage" class="form-control @error('image') is-invalid @enderror mb-3">

        <select name="sliderType" class="form-select" aria-label="Default select example">
          <option selected>Choose the slider</option>
          <option value="1">desktop</option>
          <option value="2">mobile</option>
        </select>

        @error('image')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div class="mb-3">
        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
      </div>
    </form>

    @if (count($sliderImages) > 0)
      <ul class="movielist clearfix td-medium-px-py">
        @foreach ($sliderImages as $img)
          <li class="card" style="width: 22rem;">
            <div class="card-body adminpanel">
              <a class="movie_thumb lazyload demo1" href="playvideo.html"
                style="background-image: url({{ '/uploads/' . $img->name }})"></a>
                <h6 class="card-title">{{$img->type ==1 ? 'Desktop Slider' : 'Mobile Slider'}}</h6>
                {{-- action --}}
                <div class="d-flex mb-3 flex-row">
                  <div class="p-2">
                    <a href="{{ route('edit-img', $img->id) }}" class="btn btn-primary"><i
                        class="bi bi-pencil-square"></i></a>
                  </div>
                  <div class="p-2">
                    <form action="{{ route('delete-img', ['id' => $img->id, 'name' => $img->name]) }}" method="POST"
                      enctype="multipart/form-data">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                    </form>
                  </div>
                </div>
            </div>
          </li>
        @endforeach
      </ul>
    @else
      <p> empty </p>
    @endif
  </div>
@endsection
