@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <a class="btn btn-md btn-success pull-right" href="{{route('users.create')}}">New User</a></div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">title</th>
                            <th scope="col">Role</th>
                            <th scope="col">status</th>
                            <th class="text-center" scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user )
                          <tr>
                            <th scope="row">1</th>
                            <td>{{$user->name}}</td>
                            <th scope="col">{{$user->getRoleNames()}}</th>
                            <td>{{$user->email}}</td>
                            <th class="text-center">
                                <a class="btn btn-sm btn-warning">Edit</a>
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
