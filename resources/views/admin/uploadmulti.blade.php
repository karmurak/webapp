@extends('layouts.app')
@section('content')
  <div class="py-8">
    <blockquote class="blockquote">
      <h2 class="fw-bold tg-regular-fs">Upload Adds Image</h2>
    </blockquote>
    <form action="{{ route('uploadmultiaction') }}" method="POST" enctype="multipart/form-data">
      @csrf

      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      {{-- <div class="mb-3">
        <label class="form-label" for="inputImage">Select Image:</label>
        <input type="file" name="images[]" id="inputImageMulti"
          class="form-control @error('image') is-invalid @enderror" multiple>
      </div> --}}

      <div class="input-images mb-3"></div>

      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection
