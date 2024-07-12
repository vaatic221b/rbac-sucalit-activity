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
        $users = User::select('id','name','email')->paginate(10);
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
        $roles = Role::with('permissions')->get(); // Load roles with their permissions
        return view('admin.editUser', compact('user', 'roles'));
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'nullable|array', // roles can be nullable or array
        ]);
    
        // Get selected roles or an empty array
        $roles = $request->input('roles', []);
    
        if (empty($roles)) {
            // If no roles selected (including "None" option), detach all roles from the user
            $user->roles()->detach();
        } else {
            // Update roles normally
            $user->roles()->sync($roles);
        }
    
        return redirect()->route('usertool')->with('success', 'User roles updated successfully');
    }
    
    
}
