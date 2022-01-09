<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;


class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $permissions = Permission::all();
        $roles = Role::all();
        return view('roles.roles',['permissions'=>$permissions,'roles'=>$roles]);
    }

    public function store(Request $request){
        $role = Role::create(['name'=>$request->role]);
        $role->givePermissionTo($request->name);
        return redirect()->back();
    }

    public function destroy($id){
        $role=Role::find($id);
        $role->delete();
        return redirect()->back();
    }


}
