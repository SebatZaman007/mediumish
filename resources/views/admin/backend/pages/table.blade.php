@extends('admin.backend.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Small Image</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Big Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($blog as $item)
                <tr>
                  <td>
                      <img src="{{asset('/uploads/students/'.$item->image_one)}}" width="70px" height="70px" alt="img">
                  </td>
                  <td>{{$item->title}}</td>
                  <td>{{$item->description}}</td>
                  <td>
                      <img src="{{asset('/uploads/students/'.$item->image_big)}}" width="70px" height="70px" alt="img">
                  </td>
                  <td>
                    <a class="btn btn-warning" href="{{route('blog.edit',$item->id)}}" role="button">Edit</a>
                    <a class="btn btn-danger" href="{{route('blog.delete',$item->id)}}" role="button">Delete</a>

                  </td>
                </tr>

                @endforeach

            </tbody>
          </table>
    </div>
</div>

@endsection
