@extends('layouts.app')
@section('content')
  <div class="py-8">
    <blockquote class="blockquote">
      <h2 class="fw-bold tg-regular-fs">Add new category</h2>
    </blockquote>
    <form action="{{ route('categoryaction') }}" method="POST">
      @csrf
      @if ($message = Session::get('success'))
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
        <input class="form-control" type="text" name="name" placeholder="Category name"
          aria-label="default input example">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    {{-- categories --}}
    <h1 class="fw-bold fs-2 py-3 text-center">Categories</h1>
    @if (count($categories) > 0)
      <table class="table-striped table-hover table">
        <thead>
          <tr>
            <th scope="col" class="fw-bold tg-regular-fs">No.</th>
            <th scope="col" class="fw-bold tg-regular-fs">Category Name</th>
            <th colspan="2" class="text-center fw-bold tg-regular-fs">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
            <tr>
              <th scope="row">{{ $category->id }}</th>
              <td>{{ $category->category_name }}</td>
              <td width="5%">
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $category->id }}"
                  data-bs-whatever="@mdo"><i class="bi bi-pencil-square"></i></a>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{ $category->id }}" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('update-category', $category->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <div class="mb-3">
                            {{ $category->id }}
                            <label for="category-name" class="col-form-label">Category:</label>
                            <input type="text" name="name" class="form-control" id="recipient-name"
                              value={{ $category->category_name }}>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
              <td width="5%">
                <form action="{{ route('delete-category', $category->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p> empty </p>
    @endif
  </div>
@endsection
