<?php

namespace App\Http\Controllers;

    use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function password_update(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        try {
            $user = User::findOrFail($id);

            // ✅ Update the password
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route(getPrefix() . 'user-profiles.edit', $user->id)->with('success', 'Password updated successfully!');
        } catch (\Exception $e) {
            Log::error('Password update failed: ' . $e->getMessage());
            return back()->withErrors('Something went wrong while updating the password.')->withInput();
        }
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('user.profile');
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
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'company' => 'nullable|string|max:255',
            'project_description' => 'nullable|string',
            'profile' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        try {
            $user = User::findOrFail($id);

            // ✅ Handle profile image upload
            if ($request->hasFile('profile')) {
                // Optional: Delete old image if stored
                if ($user->profile && file_exists(public_path($user->profile))) {
                    unlink(public_path($user->profile));
                }

                $file = $request->file('profile');
                $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('upload/profiles'), $fileName);
                $user->profile = 'upload/profiles/' . $fileName;
            }

            // ✅ Update user fields
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->company = $request->company;
            $user->project_description = $request->project_description;

            $user->save();

            return redirect()->route(getPrefix() . 'user-profiles.edit', $user->id)->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            Log::error('Profile update failed: ' . $e->getMessage());
            return back()->withErrors('Something went wrong.')->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
