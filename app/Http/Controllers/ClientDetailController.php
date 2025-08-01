<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('admin.client_dashboard.client_details.index', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
   

public function update(Request $request)
{
    $request->validate([
        'field' => 'required|string|in:name,email,phone,dob,address,notes',
        'value' => 'nullable|string|max:255' // customize per field
    ]);

    $user = Auth::user(); // or use ID-based lookup if needed
    $field = $request->input('field');
    $value = $request->input('value');

    $user->$field = $value;
    $user->save();

    return response()->json(['message' => 'Profile updated successfully.']);
}


    /**
     * Upload profile or cover photo.
     */
    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'photo_type' => 'required|in:profile,cover',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $user = Auth::user();
        $photoType = $request->photo_type;
        $image = $request->file('image');

        // Create a unique filename
        $filename = $photoType . '_' . $user->id . '_' . time() . '.' . $image->getClientOriginalExtension();

        // Destination path in public folder
        $destinationPath = public_path('uploads/profile');

        // Ensure directory exists
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Move file to public/uploads/profile
        $image->move($destinationPath, $filename);

        // Public URL for browser access
        $url = asset('uploads/profile/' . $filename);

        // Save the correct field
        if ($photoType === 'profile') {
            $user->profile_photo_url = $url;
        } else {
            $user->cover_photo_url = $url;
        }

        $user->save();

        return response()->json([
            'message' => ucfirst($photoType) . ' photo updated',
            'photo_url' => $url
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
