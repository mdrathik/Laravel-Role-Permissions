@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="background: #A9DFBF" class="card-header  text-center">
                    <h2>Roles Managment</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        @can('Create Role')
                        <div class="col-md-4 mx-auto">
                            <div class="myform form ">
                                <h3>Add Role</h3>
                                <form action="{{route('roles.store')}}" method="post" name="login">
                                    <div class="form-group">
                                        {{csrf_field()}}
                                        <input type="text" name="role" required class="form-control my-input" id="name"
                                            placeholder="Name">
                                    </div>
                                    <br>
                                    <p>Add your permissions</p>
                                    @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="name[]"
                                            value="{{$permission->name}}" id="{{$permission->name}}">
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
                        @endcan
                        <div class="col-md-8 mx-auto">
                            <h3>Roles with Permission</h3>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="border">
                                        <th>Role Name</th>
                                        <th>Permission</th>
                                        @can('Edit Role | Delete Role')

                                        <th>Action</th> @endcan
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
                                        <td style="display: inline-flex;">
                                            @can('Edit Role') <button style="margin: 2px" type="button"
                                                class="btn btn-sm btn-primary" onclick="EditRole('{{$role->name}}')">
                                                Edit
                                            </button>@endcan

                                            @can('Delete Role') <form style="margin: 2px"
                                                action="{{route('roles.destroy',$role->id)}}" method="POST">
                                                @method('DELETE')
                                                {{csrf_field()}}
                                                <button class="btn btn-sm btn-primary">Delete</button>
                                            </form> @endcan
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Role - <span id="balId"></span></h5>

                </div>
                <form method="POST" action="{{route('savePermission')}}">
                    {{ csrf_field() }}
                    <div class="modal-body" id="role_content">


                        <input type="number" hidden value="1">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="closeModal()">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    function EditRole(id){
        $.ajax({
            type: 'GET',
            url: "get-data/" + id,
            success: function(resultData) {
                // console.log(resultData);
              $('#balId').text(id);
              $("#role_content").html(resultData);
              $('#exampleModalCenter').modal('show');
            }
        });
    };

    function closeModal(){
        $('#exampleModalCenter').modal('hide');
    }
</script>
@endsection
