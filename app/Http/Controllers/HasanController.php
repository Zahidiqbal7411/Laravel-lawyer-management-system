<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class HasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // TODO: Replace with your actual model
        // $items = Hasan::all();
        $items = collect(); // Placeholder - replace with actual data

        return view('admin/hasan.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/hasan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // TODO: Replace with your actual model creation
            // $item = Hasan::create($request->validated());
            $routePrefix = strtolower(str_replace('Controller', '', class_basename(__CLASS__)));
            return redirect()->route('admin.' . $routePrefix . '.index')
                ->with('success', 'Hasan created successfully!');
        } catch (\Exception $e) {
            Log::error('Hasan creation failed: ' . $e->getMessage());
            return back()->withErrors('Something went wrong. Please try again.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // TODO: Implement show method
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // TODO: Replace with your actual model
        // $item = Hasan::findOrFail($id);
        $item = (object) ['id' => $id, 'title' => 'Sample Title', 'description' => 'Sample Description', 'is_active' => true];

        return view('admin/hasan.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // TODO: Replace with your actual model
        // $item = Hasan::findOrFail($id);
        $item = (object) ['id' => $id];

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // TODO: Replace with your actual model update
            // $item->update($request->validated());
            $routePrefix = strtolower(str_replace('Controller', '', class_basename(__CLASS__)));
            return redirect()->route('admin.' . $routePrefix . '.index')
                ->with('success', 'Hasan updated successfully!');
        } catch (\Exception $e) {
            Log::error('Hasan update failed: ' . $e->getMessage());
            return back()->withErrors('Something went wrong. Please try again.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // TODO: Replace with your actual model deletion
            // $item = Hasan::findOrFail($id);
            // $item->delete();
            $routePrefix = strtolower(str_replace('Controller', '', class_basename(__CLASS__)));
            return redirect()->route('admin.' . $routePrefix . '.index')
                ->with('success', 'Hasan deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Hasan deletion failed: ' . $e->getMessage());
            return back()->withErrors('Something went wrong while deleting the Hasan.');
        }
    }
}