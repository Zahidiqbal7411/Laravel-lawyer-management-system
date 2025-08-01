<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',

        ]);

        try {
            Role::create([
                'name' => $request->input('name')

            ]);

            return redirect()->route('admin.roles.index')->with('success', 'Role created successfully!');
        } catch (\Exception $e) {
            Log::error('Role creation failed: ' . $e->getMessage());
            return back()->withErrors('Something went wrong. Please try again.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);

        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $role = Role::findOrFail($id); // Ensure role exists

            $role->update([
                'name' => $request->input('name')
            ]);

            return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully!');
        } catch (\Exception $e) {
            Log::error('Role update failed: ' . $e->getMessage());
            return back()->withErrors('Something went wrong. Please try again.')->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $role = Role::findOrFail($id); // Make sure the role exists

            $role->delete(); // Delete the role

            return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully!');
        } catch (\Exception $e) {
            \Log::error('Role deletion failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Failed to delete the role. Please try again.']);
        }
    }
}
