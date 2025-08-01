<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
class PermissionController extends Controller
{
     /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permissions.create');
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
          $permission = Permission::create(['name' => $request->input('name')]);

            return redirect()->route('admin.permissions.index')->with('success', 'Permission created successfully!');
        } catch (\Exception $e) {
            Log::error('Permission creation failed: ' . $e->getMessage());
            return back()->withErrors('Something went wrong. Please try again.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Optional: Show permission detail page
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('admin.permissions.edit', compact('permission'));
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
            $permission = Permission::findOrFail($id);

            $permission->update([
                'name' => $request->input('name')
            ]);

            return redirect()->route('admin.permissions.index')->with('success', 'Permission updated successfully!');
        } catch (\Exception $e) {
            Log::error('Permission update failed: ' . $e->getMessage());
            return back()->withErrors('Something went wrong. Please try again.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $permission = Permission::findOrFail($id);
            $permission->delete();

            return redirect()->route('admin.permissions.index')->with('success', 'Permission deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Permission deletion failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Failed to delete the permission. Please try again.']);
        }
    }
}
