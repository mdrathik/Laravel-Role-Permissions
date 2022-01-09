@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="background: #A9DFBF"  class="card-header  text-center"> <h2>Permissions Managment</h2></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mx-auto">
                        <div class="myform form ">
                            <h3>Add Permission</h3>
                            <form action="{{route('permissions.store')}}" method="post" name="login">
                               <div class="form-group">
                                   {{csrf_field()}}
                                  <input type="text" name="permission"  class="form-control my-input" id="name" placeholder="Name">
                               </div>
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
                                    <th>Permission</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{$permission->name}}</td>
                                    <td>
                                        <form action="{{route('permissions.destroy',$permission->id)}}" method="POST">
                                            @method('DELETE')
                                            {{csrf_field()}}
                                            <button class="btn btn-sm btn-danger">Delete</button>
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
    </div>
</div>
@endsection
