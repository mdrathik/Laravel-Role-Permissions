@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="background: #A9DFBF"  class="card-header  text-center"> <h2>Roles Managment</h2></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mx-auto">
                        <div class="myform form ">
                            <h3>Add Role</h3>
                            <form action="{{route('roles.store')}}" method="post" name="login">
                               <div class="form-group">
                                   {{csrf_field()}}
                                  <input type="text" name="role"  class="form-control my-input" id="name" placeholder="Name">
                               </div>
                               <br>


                                    <p>Add your permissions</p>
                                   @foreach ($permissions as $permission)
                                   <div class="form-check">
                                   <input class="form-check-input" type="checkbox" name="name[]" value="{{$permission->name}}" id="{{$permission->name}}">
                                   <label class="form-check-label" for="{{$permission->name}}">
                                    {{$permission->name}}
                                   </label>
                                </div>
                                   @endforeach
                                   <br>
                               <button class="btn btn-success">Submit</button>
                            </form>
                         </div>
                      </div>
                      <div class="col-md-8 mx-auto">
                        <h3>List</h3>
                          <table class="table table-bordered">
                            <thead>
                                <tr class="border">
                                    <th>Role Name</th>
                                    <th>Permission</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{$role->name}}</td>
                                    <td>

                                        @foreach ( $role->permissions as $permission )
                                        <span style="background: #90EE90; padding-left: 4px;
                                         padding-right: 4px; border-radius: 4px;">{{$permission->name}}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-danger">Delete</button>

                                        <button class="btn btn-sm btn-info">Edit</button>
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
    </div>
</div>
@endsection
