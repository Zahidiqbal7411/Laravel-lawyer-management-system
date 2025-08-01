<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;



class AssignRoleController extends Controller
{
    public function index()
    {
        // Debugging line to check permissions

        $assign_roles = User::with('roles')->get(); // ⬅️ Get users with their assigned roles
        return view('admin.assign_roles.index', compact('assign_roles'));
    }

    public function create()
    {
        $users = User::all();
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.assign_roles.create', compact('permissions', 'roles', 'users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        try {
            $user = User::findOrFail($request->user_id);
            $role = Role::with('permissions')->findOrFail($request->role_id);

            // Assign the role to the user
            $user->syncRoles([$role->name]);

            // Assign the permissions of the role to the user
            $permissions = $role->permissions; // Collection of Permission models
            $user->syncPermissions($permissions);

            return redirect()->route('admin.assign_roles.index')
                ->with('success', 'Role and permissions assigned successfully!');
        } catch (\Exception $e) {
            \Log::error('Assigning role failed: ' . $e->getMessage());
            return back()->withErrors('Something went wrong. Please try again.')->withInput();
        }
    }





    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $users = User::all(); // Required for the dropdown in the form
        $roles = Role::all();

        $selectedRoleId = $request->query('role_id');
        $rolePermissions = collect();

        if ($selectedRoleId) {
            $role = Role::with('permissions')->find($selectedRoleId);
            if ($role) {
                $rolePermissions = $role->permissions;
            }
        }

        return view('admin.assign_roles.edit', compact(
            'user',
            'users',
            'roles',
            'selectedRoleId',
            'rolePermissions'
        ));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        try {
            $user = User::findOrFail($request->user_id);
            $role = Role::with('permissions')->findOrFail($request->role_id);

            // Sync the role
            $user->syncRoles([$role->name]);

            // Sync the permissions inherited from the role
            $permissions = $role->permissions;
            $user->syncPermissions($permissions);

            return redirect()->route('admin.assign_roles.index')
                ->with('success', 'Role and permissions updated successfully!');
        } catch (\Exception $e) {
            \Log::error('Updating role and permissions failed: ' . $e->getMessage());
            return back()->withErrors('Something went wrong. Please try again.')->withInput();
        }
    }






    public function destroy(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            // Revoke all roles
            $roles = $user->getRoleNames(); // Collection of role names
            foreach ($roles as $role) {
                $user->removeRole($role);
            }

            // Revoke all direct permissions
            $permissions = $user->getPermissionNames(); // Collection of permission names
            foreach ($permissions as $permission) {
                $user->revokePermissionTo($permission);
            }

            return redirect()->back()->with('success', 'All roles and permissions have been revoked from the user.');
        } catch (\Exception $e) {
            Log::error('Revoking roles and permissions failed: ' . $e->getMessage());
            return back()->withErrors('Something went wrong.')->withInput();
        }
    }
}
