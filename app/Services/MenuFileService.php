<?php

namespace App\Services;

use App\Models\Menu;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MenuFileService
{
    /**
     * Create admin panel folder and files for a menu
     */
    public function createAdminPanel(Menu $menu): bool
    {
        try {
            $folderPath = $menu->full_admin_panel_path;

            // Create the folder if it doesn't exist
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, 0755, true);
            }

            // Create index.blade.php
            $this->createIndexFile($menu, $folderPath);

            // Create edit.blade.php
            $this->createEditFile($menu, $folderPath);

            // Create create.blade.php
            $this->createCreateFile($menu, $folderPath);

            Log::info("Admin panel created for menu: {$menu->title}");
            return true;
        } catch (\Exception $e) {
            Log::error("Failed to create admin panel for menu {$menu->title}: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Delete admin panel folder and files for a menu
     */
    public function deleteAdminPanel(Menu $menu): bool
    {
        try {
            $folderPath = $menu->full_admin_panel_path;

            if (File::exists($folderPath)) {
                File::deleteDirectory($folderPath);
                Log::info("Admin panel deleted for menu: {$menu->title}");
            }

            return true;
        } catch (\Exception $e) {
            Log::error("Failed to delete admin panel for menu {$menu->title}: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Delete controller file for a menu
     */
    public function deleteController(Menu $menu): bool
    {
        try {
            // Convert folder_name to proper controller name (handle hyphens and underscores)
            $controllerName = str_replace(['-', '_'], '', ucwords($menu->folder_name, '-_')) . 'Controller';
            $controllerPath = app_path("Http/Controllers/{$controllerName}.php");

            if (File::exists($controllerPath)) {
                File::delete($controllerPath);
                Log::info("Controller deleted for menu: {$menu->title} ({$controllerName})");
            }

            return true;
        } catch (\Exception $e) {
            Log::error("Failed to delete controller for menu {$menu->title}: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Delete everything related to a menu (admin panel + controller)
     */
    public function deleteEverything(Menu $menu): bool
    {
        try {
            // Delete admin panel files
            $this->deleteAdminPanel($menu);

            // Delete controller file
            $this->deleteController($menu);

            Log::info("All files deleted for menu: {$menu->title}");
            return true;
        } catch (\Exception $e) {
            Log::error("Failed to delete everything for menu {$menu->title}: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Rename admin panel folder and files for a menu (preserves all data)
     */
    public function renameAdminPanel(Menu $oldMenu, Menu $newMenu): bool
    {
        try {
            $oldFolderPath = $oldMenu->full_admin_panel_path;
            $newFolderPath = $newMenu->full_admin_panel_path;

            // If old folder exists, rename it to new folder
            if (File::exists($oldFolderPath)) {
                // Create parent directory if it doesn't exist
                $parentDir = dirname($newFolderPath);
                if (!File::exists($parentDir)) {
                    File::makeDirectory($parentDir, 0755, true);
                }

                // Rename the folder
                File::moveDirectory($oldFolderPath, $newFolderPath);
                Log::info("Admin panel folder renamed from {$oldMenu->title} to {$newMenu->title}");

                // Update the content of all files to reflect the new title and route names
                $this->updateFileContents($newMenu, $newFolderPath);
            } else {
                // If old folder doesn't exist, create new one
                $this->createAdminPanel($newMenu);
            }

            return true;
        } catch (\Exception $e) {
            Log::error("Failed to rename admin panel from {$oldMenu->title} to {$newMenu->title}: " . $e->getMessage());
            return false;
        }
    }

        /**
     * Update file contents to reflect new menu title and route names
     */
    private function updateFileContents(Menu $menu, string $folderPath): void
    {
        $files = ['index.blade.php', 'create.blade.php', 'edit.blade.php'];

        foreach ($files as $file) {
            $filePath = $folderPath . '/' . $file;
            if (File::exists($filePath)) {
                $content = File::get($filePath);

                // Update the content based on file type
                switch ($file) {
                    case 'index.blade.php':
                        $newContent = $this->getIndexTemplate($menu);
                        break;
                    case 'create.blade.php':
                        $newContent = $this->getCreateTemplate($menu);
                        break;
                    case 'edit.blade.php':
                        $newContent = $this->getEditTemplate($menu);
                        break;
                    default:
                        continue 2;
                }

                File::put($filePath, $newContent);
            }
        }
    }

        /**
     * Rename controller file for a menu
     */
    public function renameController(Menu $oldMenu, Menu $newMenu): bool
    {
        try {
            // Convert folder_name to proper controller name (handle hyphens and underscores)
            $oldControllerName = str_replace(['-', '_'], '', ucwords($oldMenu->folder_name, '-_')) . 'Controller';
            $newControllerName = str_replace(['-', '_'], '', ucwords($newMenu->folder_name, '-_')) . 'Controller';

            $oldControllerPath = app_path("Http/Controllers/{$oldControllerName}.php");
            $newControllerPath = app_path("Http/Controllers/{$newControllerName}.php");

            // If old controller exists, rename it
            if (File::exists($oldControllerPath)) {
                // Create new controller with updated content
                $modelName = str_replace(['-', '_'], '', ucwords($newMenu->folder_name, '-_'));
                $controllerContent = $this->getControllerTemplate($newControllerName, $modelName, $newMenu->admin_panel_path);
                File::put($newControllerPath, $controllerContent);

                // Delete old controller
                File::delete($oldControllerPath);

                Log::info("Controller renamed from {$oldControllerName} to {$newControllerName}");
            }

            return true;
        } catch (\Exception $e) {
            Log::error("Failed to rename controller from {$oldMenu->title} to {$newMenu->title}: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Get controller template content
     */
    private function getControllerTemplate(string $controllerName, string $modelName, string $viewPath): string
    {
        $routePrefix = strtolower(Str::kebab($modelName));
        return <<<PHP
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class {$controllerName} extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // TODO: Replace with your actual model
        // \$items = {$modelName}::all();
        \$items = collect(); // Placeholder - replace with actual data

        return view('{$viewPath}.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('{$viewPath}.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request \$request)
    {
        \$validator = Validator::make(\$request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        if (\$validator->fails()) {
            return redirect()->back()->withErrors(\$validator)->withInput();
        }

        try {
            // TODO: Replace with your actual model creation
            // \$item = {$modelName}::create(\$request->validated());
            \$routePrefix = strtolower(str_replace('Controller', '', class_basename(__CLASS__)));
            return redirect()->route('admin.' . \$routePrefix . '.index')
                ->with('success', '{$modelName} created successfully!');
        } catch (\Exception \$e) {
            Log::error('{$modelName} creation failed: ' . \$e->getMessage());
            return back()->withErrors('Something went wrong. Please try again.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(\$id)
    {
        // TODO: Implement show method
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(\$id)
    {
        // TODO: Replace with your actual model
        // \$item = {$modelName}::findOrFail(\$id);
        \$item = (object) ['id' => \$id, 'title' => 'Sample Title', 'description' => 'Sample Description', 'is_active' => true];

        return view('{$viewPath}.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request \$request, \$id)
    {
        // TODO: Replace with your actual model
        // \$item = {$modelName}::findOrFail(\$id);
        \$item = (object) ['id' => \$id];

        \$validator = Validator::make(\$request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        if (\$validator->fails()) {
            return redirect()->back()->withErrors(\$validator)->withInput();
        }

        try {
            // TODO: Replace with your actual model update
            // \$item->update(\$request->validated());
            \$routePrefix = strtolower(str_replace('Controller', '', class_basename(__CLASS__)));
            return redirect()->route('admin.' . \$routePrefix . '.index')
                ->with('success', '{$modelName} updated successfully!');
        } catch (\Exception \$e) {
            Log::error('{$modelName} update failed: ' . \$e->getMessage());
            return back()->withErrors('Something went wrong. Please try again.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\$id)
    {
        try {
            // TODO: Replace with your actual model deletion
            // \$item = {$modelName}::findOrFail(\$id);
            // \$item->delete();
            \$routePrefix = strtolower(str_replace('Controller', '', class_basename(__CLASS__)));
            return redirect()->route('admin.' . \$routePrefix . '.index')
                ->with('success', '{$modelName} deleted successfully!');
        } catch (\Exception \$e) {
            Log::error('{$modelName} deletion failed: ' . \$e->getMessage());
            return back()->withErrors('Something went wrong while deleting the {$modelName}.');
        }
    }
}
PHP;
    }

    /**
     * Create index.blade.php file
     */
    private function createIndexFile(Menu $menu, string $folderPath): void
    {
        $indexContent = $this->getIndexTemplate($menu);
        File::put($folderPath . '/index.blade.php', $indexContent);
    }

    /**
     * Create edit.blade.php file
     */
    private function createEditFile(Menu $menu, string $folderPath): void
    {
        $editContent = $this->getEditTemplate($menu);
        File::put($folderPath . '/edit.blade.php', $editContent);
    }

    /**
     * Create create.blade.php file
     */
    private function createCreateFile(Menu $menu, string $folderPath): void
    {
        $createContent = $this->getCreateTemplate($menu);
        File::put($folderPath . '/create.blade.php', $createContent);
    }

    /**
     * Get index.blade.php template content
     */
    private function getIndexTemplate(Menu $menu): string
    {
        $title = $menu->title;
        $routePrefix = $menu->folder_name;

        return <<<BLADE
@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    {{ config('app.name') }} <span class="fw-normal">{{ '$title' }}</span>
                </h4>
            </div>
        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <span class="breadcrumb-item active">{{ '$title' }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ '$title' }} Management</h5>
                        <a href="{{ route('admin.{$routePrefix}.create') }}" class="btn btn-primary">
                            <i class="ph-plus me-2"></i>Add New {{ '$title' }}
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data will be populated here -->
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">
                                            No {{ strtolower('$title') }} found.
                                            <a href="{{ route('admin.{$routePrefix}.create') }}">Create your first one</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Add your JavaScript here
        console.log('{{ '$title' }} index page loaded');
    </script>
@endsection
BLADE;
    }

    /**
     * Get edit.blade.php template content
     */
    private function getEditTemplate(Menu $menu): string
    {
        $title = $menu->title;
        $routePrefix = $menu->folder_name;

        return <<<BLADE
@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    {{ config('app.name') }} <span class="fw-normal">Edit {{ $title }}</span>
                </h4>
            </div>
        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <a href="{{ route('admin.{$routePrefix}.index') }}" class="breadcrumb-item">{{ $title }}</a>
                    <span class="breadcrumb-item active">Edit</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Edit {{ $title }}</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.{$routePrefix}.update', \$item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Title -->
                            <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Title:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                           value="{{ old('title', \$item->title ?? '') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ \$message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Description:</label>
                                <div class="col-lg-10">
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                              rows="4">{{ old('description', \$item->description ?? '') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ \$message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Status:</label>
                                <div class="col-lg-10">
                                    <div class="form-check">
                                        <input type="checkbox" name="is_active" value="1" class="form-check-input"
                                               {{ old('is_active', \$item->is_active ?? true) ? 'checked' : '' }}>
                                        <label class="form-check-label">Active</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="text-end">
                                <a href="{{ route('admin.{$routePrefix}.index') }}" class="btn btn-secondary me-2">Cancel</a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="ph-check me-2"></i>Update {{ $title }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Add your JavaScript here
        console.log('{{ $title }} edit page loaded');
    </script>
@endsection
BLADE;
    }

    /**
     * Get create.blade.php template content
     */
    private function getCreateTemplate(Menu $menu): string
    {
        $title = $menu->title;
        $routePrefix = $menu->folder_name;

        return <<<BLADE
@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    {{ config('app.name') }} <span class="fw-normal">Create {{ $title }}</span>
                </h4>
            </div>
        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <a href="{{ route('admin.{$routePrefix}.index') }}" class="breadcrumb-item">{{ $title }}</a>
                    <span class="breadcrumb-item active">Create</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Create {{ $title }}</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.{$routePrefix}.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Title -->
                            <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Title:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                           value="{{ old('title') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ \$message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Description:</label>
                                <div class="col-lg-10">
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                              rows="4">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ \$message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Status:</label>
                                <div class="col-lg-10">
                                    <div class="form-check">
                                        <input type="checkbox" name="is_active" value="1" class="form-check-input"
                                               {{ old('is_active') ? 'checked' : '' }}>
                                        <label class="form-check-label">Active</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="text-end">
                                <a href="{{ route('admin.{$routePrefix}.index') }}" class="btn btn-secondary me-2">Cancel</a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="ph-check me-2"></i>Create {{ $title }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Add your JavaScript here
        console.log('{{ $title }} create page loaded');
    </script>
@endsection
BLADE;
    }
}
