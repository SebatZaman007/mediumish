@extends('admin.backend.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="{{route('blog.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="hidden" name="id" value="{{$edit->id}}">
                <label for="formFile" class="form-label">Small Image</label>
                <input class="form-control" type="file" name="image_one" id="formFile">
                <img src="{{asset('uploads/students/',$edit->image_one)}}" width="70px" height="70px" alt="img">
              </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Title</label>
              <input type="text" name="title" value="title" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <input type="text" name="description" value="description" class="form-control" id="exampleInputPassword1">
              </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Big Image</label>
                <input class="form-control" name="image_big" type="file" id="formFile">
                <img src="{{asset('uploads/students/',$edit->image_big)}}" width="70px" height="70px" alt="img">
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>

@endsection
