@extends('admin.backend.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="{{route('blog.create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="formFile" class="form-label">Small Image</label>
                <input class="form-control" type="file" name="image_one" id="formFile">
              </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Title</label>
              <input type="text" name="title" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" id="exampleInputPassword1">
              </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Big Image</label>
                <input class="form-control" name="image_big" type="file" id="formFile">
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>

@endsection
