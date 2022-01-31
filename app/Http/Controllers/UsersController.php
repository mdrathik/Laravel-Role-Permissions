<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller

{
    public function __construct()
    {
        $this->middleware('permission:Show User')->only('index');
        $this->middleware('permission:Create User')->only('create');
        $this->middleware('permission:Edit User')->only('edit', 'store','update');
        $this->middleware('permission:Delete User')->only('destroy');
    }
    public function index()
    {
        $users = User::all();
        return view('users.users', compact('users'));
    }

    public function create(){
        $roles = Role::all();
        return view('users.create',['roles'=>$roles]);
    }

    public function store(Request $request){

         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

          $user->assignRole($request->role);
        return redirect()->back();
    }

    public function edit($id){
        $roles = Role::all();
        $user=User::find($id);
        return view('users.edit', ['user'=>$user,'roles'=>$roles]);
    }

    public function update(Request $request,$id){
        $user=User::find($id);
        $user->syncRoles($request->role);
        return redirect('/users');
    }
}
