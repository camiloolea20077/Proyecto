<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\UserRequest;

class UserController extends Controller{

    public function __construct() {
        $this->middleware(['auth']);
        $this->middleware(['permission:ver-usuarios'])->only('index');
        $this->middleware(['permission:crear-usuarios'])->only('create', 'store');
        $this->middleware(['permission:editar-usuarios'])->only('edit', 'update');
        $this->middleware(['permission:eliminar-usuarios'])->only('destroy');
    }
    
    public function index(){
        $users = User::all();
        return view('dashboard.user.index', ['users'=> $users]);
    }

    public function create() {
        $roles= Role::all();
        return view('dashboard.user.create', ['user'=> new User(), 'roles'=>$roles]);
    }

    public function store(Request $request) {
        $request->validate([
            'name'=>'required',
            'password'=> 'required | min:6 | confirmed',
            'email'=> 'required | string | email | max:255 | unique:users'
        ]);
        $user= User::create(
            [
                'name'=> $request['name'],
                'surname'=> $request['surname'],
                'email'=> $request['email'],
                'password'=> Hash::make($request['password'])
            ]
        );
        $user->assignRole($request->role);
        $users = User::all();
        return view('dashboard.user.index', ['users'=> $users]);
    }

    public function show(User $user){
      return view('dashboard.user.show', ['user'=>$user]);
    }

    public function edit(User $user){
        $roles= Role::all();
        return view('dashboard.user.edit', ['user'=>$user, 'roles'=>$roles]);
    }

    public function update(Request $request, User $user){
        $request->validate([
            'name'=> 'required | string | max:255',
            'password'=> 'required | min:6 | confirmed',
            'email'=> 'required | string | email | max:255'
        ]);
        $user->update([
            'name'=> $request['name'],
            'surname'=> $request['surname'],
            'email'=> $request['email'],
            'password'=> Hash::make($request['password'])
        ]);
        $user->roles()->detach();
        $user->assignRole($request['role']);
        $users = User::all();
        return view('dashboard.user.index', ['users'=> $users]);
    }


    public function destroy(User $user){
        $user->delete();
        return back()->with('status', 'Usuario eliminado!');
    }
}
