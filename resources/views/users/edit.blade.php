@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <a class="btn btn-md btn-success pull-right" href="{{route('users.edit',1)}}">New User</a></div>
                <div class="card-body">
                    <div class="card-body">
                        <form class="col-md-6 offset-3" action="{{route('users.update',$user->id)}}" method="POST">
                            @method('PUT')
                            {{ csrf_field() }}
                            <div class="form-group">
                              <label for="formGroupExampleInput">User Name</label>
                              <input disabled type="text" class="form-control" id="formGroupExampleInput"  value="{{$user->name}}">
                            </div>


    <br>
    <select name="role" class="form-select" aria-label="Default select example">
        <option selected disabled>Open this select menu</option>
        @foreach ($roles as $role)
        <option  value="{{$role->name}}">{{$role->name}}</option>
        @endforeach

      </select>
      <br>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
