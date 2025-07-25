<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;


class UserController extends Controller
{
    public function create()
    {
         $roles=Role::all();
         
        return view('admin.user.index',compact('roles'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name'     => 'required|string|max:255',
    //         'email'    => 'required|email|unique:users,email',
    //         'password' => 'required|min:6',
    //         'status'  => 'required',
    //         'role'  => 'required',
    //         'photo' => 'required',
    //         'notes' => 'required',
    //         'phone' => 'required'
    //     ]);
       
    //     $user = new User();
    //     $user->name     = $request->name;
    //     $user->email    = $request->email;
    //     $user->password = Hash::make($request->password);
        
    //      $user->status = $request->status;
    //      $user->photo = $request-> photo;


    //     $user->save();

    //     return response()->json([
    //         'status'  => true,
    //         'message' => 'User created successfully'
    //     ]);
    // }



public function store(Request $request)
{
  
    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'status'   => 'nullable|in:0,1,2',
        'role'     => 'nullable|exists:roles,name',
        'photo'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'notes'    => 'nullable|string',
        'phone'    => 'nullable|string|max:20',
        'dob'      => 'nullable|date',
        'gender'   => 'nullable|in:male,female,other',
        'address'  => 'nullable|string|max:255',
    ]);

    $user = new User();
    $user->name     = $request->name;
    $user->email    = $request->email;
    $user->password = Hash::make($request->password);
    $user->status   = $request->status;
    $user->phone    = $request->phone;
    $user->notes    = $request->notes;
    $user->dob      = $request->dob;
    $user->gender   = $request->gender;
    $user->address  = $request->address;
    $user->role = $request->role;
   

    // Handle photo upload using move()
    if ($request->hasFile('photo')) {
        $image      = $request->file('photo');
        $imageName  = time() . '_' . $image->getClientOriginalName();
        $destinationPath = public_path('uploads/users');

        // Create directory if it doesn't exist
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $image->move($destinationPath, $imageName);

        // Save the relative path to DBs
        $user->photo = 'uploads/users/' . $imageName;
    }

    $user->save();

    // Assign role using Spatie
    $user->assignRole($request->role);

    return response()->json([
        'status'  => true,
        'message' => 'User created successfully'
    ]);
}



    public function getData(Request $request)
{
    if ($request->ajax()) {
        $users = User::select(['id', 'name', 'email', 'created_at']);
       
        return DataTables::of($users)->make(true);
    }

    // Optional fallback for non-AJAX request
    return response()->json(['message' => 'Invalid request'], 400);
}


 public function countUsers()
{
    $users = User::all();
    $usersCount = $users->count();
    return view('dashboard', compact('usersCount'));
}


}

