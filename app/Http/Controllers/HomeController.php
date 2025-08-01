<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // TODO: Replace with your actual model
        // $items = Home::all();
        $items = collect(); // Placeholder - replace with actual data

        return view('admin/home.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/home.create');
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
            // $item = Home::create($request->validated());
            $routePrefix = strtolower(str_replace('Controller', '', class_basename(__CLASS__)));
            return redirect()->route('admin.' . $routePrefix . '.index')
                ->with('success', 'Home created successfully!');
        } catch (\Exception $e) {
            Log::error('Home creation failed: ' . $e->getMessage());
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
        // $item = Home::findOrFail($id);
        $item = (object) ['id' => $id, 'title' => 'Sample Title', 'description' => 'Sample Description', 'is_active' => true];

        return view('admin/home.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // TODO: Replace with your actual model
        // $item = Home::findOrFail($id);
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
                ->with('success', 'Home updated successfully!');
        } catch (\Exception $e) {
            Log::error('Home update failed: ' . $e->getMessage());
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
            // $item = Home::findOrFail($id);
            // $item->delete();
            $routePrefix = strtolower(str_replace('Controller', '', class_basename(__CLASS__)));
            return redirect()->route('admin.' . $routePrefix . '.index')
                ->with('success', 'Home deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Home deletion failed: ' . $e->getMessage());
            return back()->withErrors('Something went wrong while deleting the Home.');
        }
    }
}