<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;


class RoleController extends Controller
{
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
}
