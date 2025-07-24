<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{
    public function create()
    {
        return view('admin.user.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

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
}

