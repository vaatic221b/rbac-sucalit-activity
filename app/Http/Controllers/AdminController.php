<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function manageUsers(){
        $users = User::select('id','name','email')->get();
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.manageUsers')->with(compact('users'));
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('usertool')->with('success', 'User deleted successfully');
    }

    public function editUser(User $user)
    {
        $roles = Role::all();
        return view('admin.editUser', compact('user', 'roles'));
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'required|array',
        ]);

        $user->roles()->sync($request->roles);

        return redirect()->route('usertool')->with('success', 'User roles updated successfully');
    }
}
