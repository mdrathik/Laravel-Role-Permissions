<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;


class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Show Role')->only('index');
        $this->middleware('permission:Create Role')->only('create','store');
        $this->middleware('permission:Edit Role')->only('edit','SavePermission','getData');
        $this->middleware('permission:Delete Role')->only('destroy');

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


    public function getData($id){
        $permissions = Permission::all();
        $current = Role::findByName($id)->permissions;
        $html = '';

        foreach($permissions as $data){
            $checked = '';
            foreach($current as $now){
               if($now->name === $data->name){
                   $checked = "checked";
               }
            }

            $html .= '<div class="form-check">
                        <input type="hidden" name="id" value='.$id.'>
                        <input class="form-check-input" type="checkbox" '.$checked.' name="name[]" value="'.$data->name.'" id="x'.$data->name.'">
                        <label class="form-check-label" for="x'.$data->name.'">
                            '.$data->name.'
                        </label>
                    </div>';
        }
        return $html;
    }


    public function SavePermission(Request $request){

        $role=Role::findByName($request->id);
        $role->syncPermissions($request->name);
        return redirect()->back();
    }



}
