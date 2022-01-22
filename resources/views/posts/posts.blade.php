@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <a class="btn btn-md btn-success pull-right" href="{{route('posts.create')}}">New Post</a></div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">title</th>
                            <th scope="col">status</th>
                            <th class="text-center" scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post )
                          <tr>
                            <th scope="row">1</th>
                            <td>{{$post->title}}</td>
                            <td>{{$post->status}}</td>
                            <th class="text-center">
                                <a class="btn btn-sm btn-info" href="{{route('posts.edit',$post->id)}}">Edit</a>

                                @if($post->status==0)
                                <a class="btn btn-sm btn-warning">UnPublished</a>
                                @else
                                <a class="btn btn-sm btn-success">Published</a>
                                @endif


                                <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                                    @method('DELETE')
                                    {{csrf_field()}}
                                    <button type="submit"  class="btn btn-sm btn-danger">Delete</button>
                                </form>

                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
