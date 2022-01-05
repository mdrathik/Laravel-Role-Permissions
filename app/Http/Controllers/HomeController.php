<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$Permission= Permission::create(['name'=> 'edit post']);
        //Role::create(['name' => 'writter']);
        //$role = Role::findById(1);
        //$permission = Permission::findById(2);
        //$role->givePermissionTo($permission );
        //Auth::user()->assignRole('admin');
        return view('home');
    }
}
