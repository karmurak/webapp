@extends('layouts.app')
@section('content')
  <div class="py-8">
    <div class="pull-right mb-3">
      <a href="{{ route('upload-img') }}" enctype="multipart/form-data"><i class="bi bi-chevron-left display-6"></i></a>
    </div>

    @if (session('status'))
      <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
      </div>
    @endif
    {{-- {{dd($req->id)}} --}}
    <form action="{{ route('update-img', $id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      @if ($message = Session::get('success'))
          <div class="alert alert-success alert-dismissible fade show " role="alert">
          {{ $message }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <img src={{ '/uploads/' . $img->name }} width="30%" class="mb-3"/><br/>
      <div class="form-group mb-3">
        <input type="file" name="image" class="form-control mb-3" placeholder="Post Title" id="inputImage">

        <select name="sliderType" class="form-select" aria-label="Default select example">
          <option selected>Choose the slider</option>
          <option value="1">desktop</option>
          <option value="2">mobile</option>
        </select>

        @error('image')
          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
@endsection
