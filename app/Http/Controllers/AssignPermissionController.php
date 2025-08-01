<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;


class AssignPermissionController extends Controller
{
    public function index()
    {
        $assign_permissions = Role::with('permissions')->get();
        return view('admin.assign_permissions.index', compact('assign_permissions'));
    }
    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.assign_permissions.create', compact('permissions', 'roles'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'required|array',
        ]);

        try {
            // Find the role with related users
            $role = Role::with('users')->findOrFail($request->role_id);

            // Get permission names from IDs
            $permissionNames = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();

            // Assign permissions to the role
            $role->syncPermissions($permissionNames);

            // OPTIONAL: Assign same permissions directly to all users who have this role
            foreach ($role->users as $user) {
                $user->syncPermissions($role->permissions); // Syncs role's current permissions directly to user
            }

            return redirect()->route('admin.assign_permissions.index')->with('success', 'Permissions assigned to role and users successfully!');
        } catch (\Exception $e) {
            Log::error('Assigning permissions failed: ' . $e->getMessage());
            return back()->withErrors('Something went wrong. Please try again.')->withInput();
        }
    }

    public function edit($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        $permissions = Permission::all();

        return view('admin.assign_permissions.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'permissions' => 'required|array',
        ]);

        try {
            // Get the role and its users
            $role = Role::with('users')->findOrFail($id);

            // Get permission names
            $permissionNames = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();

            // Sync permissions to the role
            $role->syncPermissions($permissionNames);

            // OPTIONAL: Sync the same permissions directly to all users with this role
            foreach ($role->users as $user) {
                $user->syncPermissions($role->permissions);
            }

            return redirect()->route('admin.assign_permissions.index')
                ->with('success', 'Permissions updated for role and all related users.');
        } catch (\Exception $e) {
            Log::error('Updating permissions failed: ' . $e->getMessage());
            return back()->withErrors('Something went wrong.')->withInput();
        }
    }




    public function destroy(Request $request, $id)
    {
        try {
            $role = Role::findOrFail($id);
            $permissionNames = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();

            foreach ($permissionNames as $permissionName) {
                $role->revokePermissionTo($permissionName);
            }

            return redirect()->back()->with('success', 'Selected permissions revoked from the role.');
        } catch (\Exception $e) {
            Log::error('Revoking permissions failed: ' . $e->getMessage());
            return back()->withErrors('Something went wrong.');
        }
    }
}
