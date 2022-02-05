@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header "> <a href="{{route('posts.index')}}"
                        class="pull-right btn btn-md btn-success pull-right">List</a></div>
                <div class="card-body">
                    <form method="POST" action="{{route('posts.store')}}">
                        {{csrf_field()}}
                        <h2 class="text-center ">Creating Post</h2>
                        <div class="form-group mt-3">
                            <label>Enter your Title</label>
                            <input required type="text" class="form-control" name="title" placeholder="title">
                        </div>

                        <div class="form-group mt-3">
                            <label>Descriptions</label>
                            <textarea required class="form-control" name="description" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
