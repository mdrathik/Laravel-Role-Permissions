<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
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
        return $request->all();
    }
}
