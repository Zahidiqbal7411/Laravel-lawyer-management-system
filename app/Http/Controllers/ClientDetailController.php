<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\UploadedFile;






class ClientDetailController extends Controller
{
    
    public function index()
    {
        //
    }

   
    public function create()
    {
        $user = Auth::user();
        return view('admin.client_dashboard.client_details.index', get_defined_vars());
    }

   
    public function store(Request $request)
    {
        
    }

   
    public function show(string $id)
    {
        
    }

    
    public function edit(string $id)
    {
       
    }

   
   

public function update(Request $request)
{
    $request->validate([
        'field' => 'required|string|in:name,email,phone,dob,address,notes',
        'value' => 'nullable|string|max:255' 
    ]);

    $user = Auth::user(); 
    $field = $request->input('field');
    $value = $request->input('value');

    $user->$field = $value;
    $user->save();

    return response()->json(['message' => 'Profile updated successfully.']);
}


   

// public function uploadPhoto(Request $request)
// {
//  // Debugging line to check request data
//     \Log::info('Request received:', $request->all());

//     // Validate input
//     $request->validate([
//         'photo_type' => 'required|in:profile,cover',
//         'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
//     ]);

//     try {
//         $user = Auth::user();
//         $photoType = $request->photo_type;
//         $imageFile = $request->file('image');

//         // Save image content to DB
//         $imageData = file_get_contents($imageFile->getRealPath());

//         if ($photoType === 'profile') {
//             $user->profile_image = $imageData;
//         } else {
//             $user->cover_image = $imageData;
//         }

//         $user->save();

//         return response()->json([
//             'message' => ucfirst($photoType) . ' photo updated successfully!',
//             'photo_url' => 'data:' . $imageFile->getMimeType() . ';base64,' . base64_encode($imageData)
//         ]);
//     } catch (\Exception $e) {
//         \Log::error('Upload photo failed: ' . $e->getMessage());
//         return response()->json(['message' => 'Server error'], 500);
//     }
// }
// public function uploadPhoto(Request $request)
// {
//     // Log incoming request (for debugging)
//     \Log::info('Photo upload request received.', $request->all());

//     // Validate the request
//     $request->validate([
//         'photo_type' => 'required|in:profile,cover',
//         'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
//     ]);

//     try {
//         $user = Auth::user();
//         $photoType = $request->photo_type;
//         $imageFile = $request->file('image');

//         // Encode the image to base64
//         $imageData = base64_encode(file_get_contents($imageFile->getRealPath()));
//         $mimeType = $imageFile->getMimeType(); // e.g., image/jpeg

//         // Save base64 string to the appropriate column
//         if ($photoType === 'profile') {
//             $user->profile_image = $imageData;
//         } else {
//             $user->cover_image = $imageData;
//         }

//         $user->save();

//         \Log::info("{$photoType} photo updated for user ID {$user->id}");

//         return response()->json([
//             'message' => ucfirst($photoType) . ' photo updated successfully!',
//             'photo_url' => 'data:' . $mimeType . ';base64,' . $imageData
//         ]);

//     } catch (\Exception $e) {
//         \Log::error('Upload photo failed: ' . $e->getMessage());
//         return response()->json(['message' => 'Server error'], 500);
//     }
// }
// public function uploadPhoto(Request $request)
// {
//     // Log the incoming request
//     Log::info('Photo upload request received.', $request->all());

//     // Validate the request
//     $request->validate([
//         'photo_type' => 'required|in:profile,cover',
//         'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
//     ]);

//     try {
//         $user = Auth::user();
//         $photoType = $request->photo_type;
//         $imageFile = $request->file('image');

//         // Generate unique filename with extension
//         $fileName = time() . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();

//         // Determine upload path based on type
//         $folder = $photoType === 'profile' ? 'uploads/profile' : 'uploads/cover';
//         $relativePath = $folder . '/' . $fileName;
//         $publicPath = public_path($folder);

//         // Ensure the directory exists
//         if (!file_exists($publicPath)) {
//             mkdir($publicPath, 0755, true);
//         }

//         // Move file to public/uploads/profile or public/uploads/cover
//         $imageFile->move($publicPath, $fileName);

//         // Save relative path in database
//         if ($photoType === 'profile') {
//             $user->profile_image = $relativePath;
//         } else {
//             $user->cover_image = $relativePath;
//         }

//         $user->save();

//         Log::info("{$photoType} photo updated for user ID {$user->id}");

//         return response()->json([
//             'message' => ucfirst($photoType) . ' photo updated successfully!',
//             'photo_url' => asset($relativePath),
//         ]);

//     } catch (\Exception $e) {
//         Log::error('Upload photo failed: ' . $e->getMessage());
//         return response()->json(['message' => 'Server error'], 500);
//     }
// }


// public function uploadPhoto(Request $request)
// {
//     $request->validate([
//         'photo_type' => 'required|in:profile,cover',
//         'image' => 'required|string',
//     ]);

//     $user = Auth::user();
//     $photoType = $request->photo_type;
//     $base64Image = $request->image;

//     if (!preg_match('/^data:image\/(\w+);base64,/', $base64Image, $typeMatch)) {
//         return response()->json(['message' => 'Invalid base64 format'], 422);
//     }

//     $extension = strtolower($typeMatch[1]);
//     if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
//         return response()->json(['message' => 'Unsupported image format'], 422);
//     }

//     $base64Image = substr($base64Image, strpos($base64Image, ',') + 1);
//     $decoded = base64_decode($base64Image);

//     if ($decoded === false) {
//         return response()->json(['message' => 'Base64 decode failed'], 422);
//     }

//     // Create temp file
//     $tempPath = sys_get_temp_dir() . '/' . Str::random(10) . '.' . $extension;
//     file_put_contents($tempPath, $decoded);

//     // Create UploadedFile instance
//     $tempFile = new UploadedFile(
//         $tempPath,
//         'temp.' . $extension,
//         'image/' . $extension,
//         null,
//         true // $test = true because this is not an HTTP uploaded file
//     );

//     // Define destination
//     $folder = $photoType === 'profile' ? 'uploads/profile' : 'uploads/cover';
//     $fileName = time() . '_' . Str::random(10) . '.' . $extension;
//     $destinationPath = public_path($folder);

//     if (!file_exists($destinationPath)) {
//         mkdir($destinationPath, 0755, true);
//     }

//     // Move file (this renames and moves the temp file)
//     $tempFile->move($destinationPath, $fileName);

//     // Save relative path to DB
//     $relativePath = $folder . '/' . $fileName;
//     if ($photoType === 'profile') {
//         $user->profile_image = $relativePath;
//     } else {
//         $user->cover_image = $relativePath;
//     }

//     $user->save();

//     // Delete temp file if it still exists (usually moved, so shouldn't exist)
//     if (file_exists($tempPath)) {
//         unlink($tempPath);
//     }

//     return response()->json([
//         'message' => ucfirst($photoType) . ' photo updated successfully!',
//         'photo_url' => asset($relativePath),
//     ]);
// }
// public function uploadPhoto(Request $request)
// {
//     $request->validate([
//         'photo_type' => 'required|in:profile,cover',
//         'image' => 'required|string',
//     ]);

//     $user = Auth::user();
//     $photoType = $request->photo_type;
//     $base64Image = $request->image;

//     // Validate base64 image string
//     if (!preg_match('/^data:image\/(\w+);base64,/', $base64Image, $typeMatch)) {
//         return response()->json(['message' => 'Invalid base64 format'], 422);
//     }

//     $extension = strtolower($typeMatch[1]);
//     if (!in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
//         return response()->json(['message' => 'Unsupported image format'], 422);
//     }

//     $base64Image = substr($base64Image, strpos($base64Image, ',') + 1);
//     $decoded = base64_decode($base64Image);
//     if ($decoded === false) {
//         return response()->json(['message' => 'Base64 decode failed'], 422);
//     }

//     // Save to temporary file
//     $tempPath = sys_get_temp_dir() . '/' . Str::random(10) . '.' . $extension;
//     file_put_contents($tempPath, $decoded);

//     $tempFile = new UploadedFile(
//         $tempPath,
//         'temp.' . $extension,
//         'image/' . $extension,
//         null,
//         true
//     );

//     // Determine destination folder and DB column
//     $folder = $photoType === 'profile' ? 'uploads/profile' : 'uploads/cover';
//     $column = $photoType === 'profile' ? 'profile_image' : 'cover_image';

//     $fileName = time() . '_' . Str::random(10) . '.' . $extension;
//     $destinationPath = public_path($folder);

//     if (!file_exists($destinationPath)) {
//         mkdir($destinationPath, 0755, true);
//     }

//     // Delete old image if exists
//     $oldPath = public_path($user->{$column});
//     if ($user->{$column} && file_exists($oldPath)) {
//         unlink($oldPath);
//     }

//     // Move file and update DB
//     $tempFile->move($destinationPath, $fileName);
//     $relativePath = $folder . '/' . $fileName;

//     $user->{$column} = $relativePath;
//     $user->save();

//     // Cleanup temp file if still there
//     if (file_exists($tempPath)) {
//         unlink($tempPath);
//     }

//     return response()->json([
//         'message' => ucfirst($photoType) . ' photo updated successfully!',
//         'photo_url' => asset($relativePath),
//     ]);
// }



// public function uploadPhoto(Request $request)
// {
//     $request->validate([
//         'photo_type' => 'required|in:profile,cover',
//         'image' => 'required|string',
//     ]);

//     $user = Auth::user();
//     if (!$user) {
//         return response()->json(['message' => 'User not authenticated'], 401);
//     }

//     $photoType = $request->photo_type;
//     $base64Image = $request->image;

//     // Validate base64 format
//     if (!preg_match('/^data:image\/(\w+);base64,/', $base64Image, $typeMatch)) {
//         return response()->json(['message' => 'Invalid base64 format'], 422);
//     }

//     $extension = strtolower($typeMatch[1]);
//     if (!in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
//         return response()->json(['message' => 'Unsupported image format'], 422);
//     }

//     // Decode base64 image data
//     $base64Data = substr($base64Image, strpos($base64Image, ',') + 1);
//     $decodedImage = base64_decode($base64Data);

//     if ($decodedImage === false) {
//         return response()->json(['message' => 'Base64 decode failed'], 422);
//     }

//     // Create temp file path
//     $tempPath = sys_get_temp_dir() . '/' . Str::random(10) . '.' . $extension;
//     file_put_contents($tempPath, $decodedImage);

//     // Create UploadedFile instance for Laravel to handle moving file
//     $tempFile = new UploadedFile(
//         $tempPath,
//         'temp.' . $extension,
//         'image/' . $extension,
//         null,
//         true // Mark test mode, because this is not from HTTP request
//     );

//     // Determine upload folder and DB column name
//     $folder = $photoType === 'profile' ? 'uploads/profile' : 'uploads/cover';
//     $column = $photoType === 'profile' ? 'profile_image' : 'cover_image';

//     $destinationPath = public_path($folder);
//     if (!file_exists($destinationPath)) {
//         mkdir($destinationPath, 0755, true);
//     }

//     // Delete old image file if exists
//     $oldImagePath = public_path($user->{$column});
//     if ($user->{$column} && file_exists($oldImagePath)) {
//         unlink($oldImagePath);
//     }

//     // Generate new unique filename
//     $fileName = time() . '_' . Str::random(10) . '.' . $extension;

//     // Move temp file to final destination
//     $tempFile->move($destinationPath, $fileName);

//     // Save relative path in user DB column
//     $relativePath = $folder . '/' . $fileName;
//     $user->{$column} = $relativePath;
//     $user->save();

//     // Delete temp file if still exists
//     if (file_exists($tempPath)) {
//         unlink($tempPath);
//     }

//     return response()->json([
//         'message' => ucfirst($photoType) . ' photo updated successfully!',
//         'photo_url' => asset($relativePath),
//     ]);
// }

// public function uploadPhoto(Request $request)
// {
//     $request->validate([
//         'photo_type' => 'required|in:profile,cover',
//         'image' => 'required|string',
//     ]);

//     $user = Auth::user();
//     if (!$user) {
//         return response()->json(['message' => 'User not authenticated'], 401);
//     }

//     $photoType = $request->photo_type;
//     $base64Image = $request->image;

//     // Check base64 header format
//     if (!preg_match('/^data:image\/(\w+);base64,/', $base64Image, $typeMatch)) {
//         return response()->json(['message' => 'Invalid base64 format'], 422);
//     }

//     $extension = strtolower($typeMatch[1]);
//     if (!in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
//         return response()->json(['message' => 'Unsupported image format'], 422);
//     }

//     // Decode base64 string (after comma)
//     $base64Data = substr($base64Image, strpos($base64Image, ',') + 1);
//     $decodedImage = base64_decode($base64Data);

//     if ($decodedImage === false) {
//         return response()->json(['message' => 'Base64 decode failed'], 422);
//     }

//     // Create temp file path and write decoded image
//     $tempPath = sys_get_temp_dir() . '/' . \Str::random(10) . '.' . $extension;
//     file_put_contents($tempPath, $decodedImage);

//     if (!file_exists($tempPath)) {
//         return response()->json(['message' => 'Failed to create temp file'], 500);
//     }

//     // Create UploadedFile instance
//     $tempFile = new \Illuminate\Http\UploadedFile(
//         $tempPath,
//         'temp.' . $extension,
//         'image/' . $extension,
//         null,
//         true
//     );

//     // Determine destination folder and DB column
//     $folder = $photoType === 'profile' ? 'uploads/profile' : 'uploads/cover';
//     $column = $photoType === 'profile' ? 'profile_image' : 'cover_image';

//     $destinationPath = public_path($folder);

//     if (!file_exists($destinationPath)) {
//         mkdir($destinationPath, 0755, true);
//     }

//     if (!is_writable($destinationPath)) {
//         return response()->json(['message' => 'Upload folder not writable'], 500);
//     }

//     // Delete old image if exists
//     $oldImagePath = public_path($user->{$column});
//     if ($user->{$column} && file_exists($oldImagePath)) {
//         unlink($oldImagePath);
//     }

//     // Generate unique filename
//     $fileName = time() . '_' . \Str::random(10) . '.' . $extension;

//     // Move temp file to final destination
//     $tempFile->move($destinationPath, $fileName);

//     $finalPath = $destinationPath . '/' . $fileName;

//     if (!file_exists($finalPath)) {
//         return response()->json(['message' => 'Failed to save uploaded file'], 500);
//     }

//     // Save relative path to DB (relative to public folder)
//     $relativePath = $folder . '/' . $fileName;
//     $user->{$column} = $relativePath;
//     $user->save();

//     // Delete temp file if still exists (usually already moved)
//     if (file_exists($tempPath)) {
//         unlink($tempPath);
//     }

//     return response()->json([
//         'message' => ucfirst($photoType) . ' photo updated successfully!',
//         'photo_url' => asset($relativePath),
//     ]);
// }

// public function uploadPhoto(Request $request)
// {
//     $request->validate([
//         'photo_type' => 'required|in:profile,cover',
//         'image' => 'required|string',
//     ]);

//     $user = Auth::user();
//     if (!$user) {
//         return response()->json(['message' => 'User not authenticated'], 401);
//     }

//     $photoType = $request->photo_type;
//     $base64Image = $request->image;

//     // Validate base64 image format
//     if (!preg_match('/^data:image\/(\w+);base64,/', $base64Image, $typeMatch)) {
//         return response()->json(['message' => 'Invalid base64 format'], 422);
//     }

//     $extension = strtolower($typeMatch[1]);
//     if (!in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
//         return response()->json(['message' => 'Unsupported image format'], 422);
//     }

//     // Save base64 string directly in DB column
//     $column = $photoType === 'profile' ? 'profile_image' : 'cover_image';

//     // Optionally delete old base64 string by setting to null or overwrite directly
//     $user->{$column} = $base64Image;
//     $user->save();

//     return response()->json([
//         'message' => ucfirst($photoType) . ' photo updated successfully!',
//         'photo_base64' => $base64Image, // you can return the base64 directly if needed
//     ]);
// }
// public function uploadPhoto(Request $request)
// {
//     $request->validate([
//         'photo_type' => 'required|in:profile,cover',
//         'image' => 'required|file|image|mimes:jpg,jpeg,png,gif|max:2048',
//     ]);

//     $user = Auth::user();
//     if (!$user) {
//         return response()->json(['message' => 'User not authenticated'], 401);
//     }

//     $photoType = $request->photo_type;
//     $imageFile = $request->file('image');

//     // Set folder and DB column
//     $folder = $photoType === 'profile' ? 'uploads/profile' : 'uploads/cover';
//     $column = $photoType === 'profile' ? 'profile_image' : 'cover_image';

//     // Delete old image if exists
//     if ($user->{$column}) {
//         $oldPath = public_path($user->{$column});
//         if (file_exists($oldPath)) {
//             @unlink($oldPath);
//         }
//     }

//     // Generate unique filename
//     $fileName = time() . '_' . \Str::random(10) . '.' . $imageFile->getClientOriginalExtension();

//     // Save image
//     $imageFile->move(public_path($folder), $fileName);

//     // Save relative path to DB
//     $relativePath = $folder . '/' . $fileName;
//     $user->{$column} = $relativePath;
//     $user->save();

//     return response()->json([
//         'message' => ucfirst($photoType) . ' photo updated successfully!',
//         'photo_url' => asset($relativePath),
//     ]);
// }


public function uploadPhoto(Request $request)
{
    // Validate request
    $request->validate([
        'photo_type' => 'required|in:profile,cover',
        'image' => 'required|file|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    // Get authenticated user
    $user = Auth::user();
    if (!$user) {
        return response()->json(['message' => 'User not authenticated'], 401);
    }

    $photoType = $request->photo_type;
    $imageFile = $request->file('image');

    // Set folder and DB column based on photo type
    $folder = $photoType === 'profile' ? 'uploads/profile' : 'uploads/cover';
    $column = $photoType === 'profile' ? 'profile_image' : 'cover_image';

    // Delete old image if exists
    if ($user->{$column}) {
        $oldPath = public_path($user->{$column});
        if (file_exists($oldPath)) {
            try {
                unlink($oldPath);
            } catch (\Exception $e) {
                Log::error("Error deleting old image: {$oldPath}. Exception: " . $e->getMessage());
            }
        }
    }

    // Generate unique filename
    $fileName = time() . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();

    // Ensure folder exists
    if (!file_exists(public_path($folder))) {
        mkdir(public_path($folder), 0755, true);
    }

    // Move file to destination
    $imageFile->move(public_path($folder), $fileName);

    // Save relative path to DB
    $relativePath = $folder . '/' . $fileName;
    $user->{$column} = $relativePath;
    $user->save();

    // Return response
    return response()->json([
        'message' => ucfirst($photoType) . ' photo updated successfully!',
        'photo_url' => asset($relativePath),
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
