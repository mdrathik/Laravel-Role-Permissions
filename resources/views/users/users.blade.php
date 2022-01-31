@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               @can('Create User') <div class="card-header"> <a class="btn btn-md btn-success pull-right" href="{{route('users.create')}}">New User</a></div>@endcan
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">title</th>
                            <th scope="col">Role</th>
                            <th scope="col">status</th>
                          @can('Delete User | Edit User')
                          <th class="text-center" scope="col">Action</th>
                          @endcan
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
                            @can('Edit User')  <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-warning">Edit</a>  @endcan
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
