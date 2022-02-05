@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <a class="btn btn-md btn-success pull-right"
                        href="{{route('users.create')}}">Creating New Users</a></div>
                <div class="card-body">
                    <form class="col-md-6 offset-3" action="{{route('users.store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="formGroupExampleInput">User Name</label>
                            <input name="name" type="text" class="form-control" id="formGroupExampleInput"
                                placeholder="User Name">
                        </div>

                        <br>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">User Email</label>
                            <input name="email" type="email" class="form-control" id="formGroupExampleInput2"
                                placeholder="email">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Password</label>
                            <input name="password" type="password" class="form-control" id="formGroupExampleInput2"
                                placeholder="email">
                        </div>
                        <br>
                        <select name="role" class="form-select" aria-label="Default select example">
                            <option selected disabled>Open this select menu</option>
                            @foreach ($roles as $role)
                            <option value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach

                        </select>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
