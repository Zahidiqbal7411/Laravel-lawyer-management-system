<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Activity;
use App\Services\ActivityService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function create()
    {
        $roles = \Spatie\Permission\Models\Role::all();
        return view('auth.login', compact('roles'));
    }

    public function index()
    {
        $users = \App\Models\User::all();
        return view('user.list', compact('users'));
    }

    public function store(Request $request)
    {
        dd('User registration logic here'); // Placeholder for user registration logic
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => ['required', 'confirmed'],
            'role' => 'required|exists:roles,name',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => \Hash::make($request->password),
            ]);

            $user->assignRole($request->role);

            // \Auth::login($user); // Remove auto-login for admin-created users

            return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
        } catch (\Throwable $e) {
            \Log::error('User registration failed: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors([
                'registration_error' => 'Something went wrong during registration. Please try again later.',
            ]);
        }
    }

    public function show($id)
    {
        $user = \App\Models\User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = \App\Models\User::findOrFail($id);
        $roles = \Spatie\Permission\Models\Role::all();
        return view('user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = \App\Models\User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|exists:roles,name',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = \Hash::make($request->password);
        }
        $user->save();
        // Sync role
        $user->syncRoles([$request->role]);
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = \App\Models\User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    public function dashboard()
    {
        $user = \Auth::user();
        $projects = Project::where('created_by', $user->id)
                          ->orWhere('client_id', $user->id)
                          ->orderBy('created_at', 'desc')
                          ->get();

        $activities = ActivityService::getUserActivities($user->id, 10);

        return view('admin.user.dashboard', compact('projects', 'activities'));
    }
}
