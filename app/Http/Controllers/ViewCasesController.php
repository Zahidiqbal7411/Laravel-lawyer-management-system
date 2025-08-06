<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Cases;

class ViewCasesController extends Controller
{
    public function create()
    {
        return view('admin.client_dashboard.client_cases.index');
    }

    public function index(Request $request)
    {
        $query = Cases::select([
            'id',
            'title',       // changed from 'name' to 'title'
            'status',
            'created_at'
        ]);

        return DataTables::of($query)
            ->editColumn('created_at', function ($row) {
                return $row->created_at->format('Y-m-d');
            })
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'case_number' => 'required|string|max:255|unique:cases,case_number',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'case_type' => 'required|string|max:255',
            'status' => 'required|in:open,pending,closed,archived',
            'court_name' => 'required|string|max:255',
            'filing_date' => 'required|date',
            'resolution_date' => 'nullable|date',
            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $filePaths = [];

        $uploadPath = public_path('case_attachments');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $file->move($uploadPath, $filename);
                $filePaths[] = 'case_attachments/' . $filename;
            }
        }

        Cases::create([
            'case_number' => $request->case_number,
            'title' => $request->title,
            'description' => $request->description,
            'case_type' => $request->case_type,
            'status' => $request->status,
            'court_name' => $request->court_name,
            'filing_date' => $request->filing_date,
            'resolution_date' => $request->resolution_date,
            'attachment_paths' => json_encode($filePaths),
            'client_id' => Auth::user()->id, // ✅ fixed Auth usage
        ]);

        return redirect()->back()->with('success', 'Case submitted successfully with attachments.');
    }
}
