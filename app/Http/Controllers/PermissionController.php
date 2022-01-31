<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Show Permission')->only('index');
        $this->middleware('permission:Create Permission')->only('create');
        $this->middleware('permission:Edit Permission')->only('store');
        $this->middleware('permission:Delete Permission')->only('destroy');
    }
    //
    public function index(){
        $permissions = Permission::all();
        return view('permissions.permission',['permissions' => $permissions]);
    }

    public function store(Request $request){
        Permission::create(['name'=>$request->permission]);
        return redirect()->back();
    }

    public function destroy($id){
        $permission=Permission::find($id);
        $permission->delete();
        return redirect()->back();
    }


}
