@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-gray-800">Client Cases</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
            Submit new Case
        </button>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />

    <div class="overflow-x-auto">
        <table id="client-table" class="display w-full text-sm text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th>Case ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

{{-- <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Submit a New Case</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data" id="modal-form">
                    @csrf
                    <div class="mb-3">
                        <label for="case-title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="case-title" name="title" placeholder="Enter case title" required>
                    </div>
                    <div class="mb-3">
                        <label for="case-description" class="form-label">Description</label>
                        <textarea class="form-control" id="case-description" name="description" rows="4" placeholder="Describe the case in detail" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="case-file" class="form-label">Attachments</label>
                        <input type="file" class="form-control" id="case-file" name="attachments[]" multiple>
                        <div class="form-text">Attach any relevant documents or images.</div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="terms-checkbox" required>
                        <label class="form-check-label" for="terms-checkbox">
                            I agree to the <a href="#" class="text-primary">Terms and Conditions</a>
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="modal-form" class="btn btn-success">Submit Case</button>
            </div>
        </div>
    </div>
</div> --}}
<!-- Modal -->
{{-- <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Submit a New Case</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <!-- START FORM -->
                <form action="{{ route(getPrefix().'client.cases.store')" method="POST" enctype="multipart/form-data" id="modal-form">
                    @csrf

                    <!-- Show Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="case-title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="case-title" name="title" placeholder="Enter case title" required value="{{ old('title') }}">
                    </div>

                    <div class="mb-3">
                        <label for="case-description" class="form-label">Description</label>
                        <textarea class="form-control" id="case-description" name="description" rows="4" placeholder="Describe the case in detail" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="case-file" class="form-label">Attachments</label>
                        <input type="file" class="form-control" id="case-file" name="attachments[]" multiple>
                        <div class="form-text">Attach any relevant documents or images (PDF, JPG, PNG, DOCX).</div>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="terms-checkbox" required>
                        <label class="form-check-label" for="terms-checkbox">
                            I agree to the <a href="#" class="text-primary">Terms and Conditions</a>
                        </label>
                    </div>
                </form>
                <!-- END FORM -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="modal-form" class="btn btn-success">Submit Case</button>
            </div>
        </div>
    </div>
</div> --}}
{{-- <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Submit a New Case</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route(getPrefix().'cases.store') }}" method="POST" enctype="multipart/form-data" id="modal-form">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="case-title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="case-title" name="title" value="{{ old('title') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="case-description" class="form-label">Description</label>
                        <textarea class="form-control" id="case-description" name="description" rows="4" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="case-file" class="form-label">Attachments</label>
                        <input type="file" class="form-control" id="case-file" name="attachments[]" multiple>
                        <div class="form-text">Attach documents or images (PDF, JPG, PNG, DOCX).</div>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="terms-checkbox" required>
                        <label class="form-check-label" for="terms-checkbox">
                            I agree to the <a href="#" class="text-primary">Terms and Conditions</a>
                        </label>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="modal-form" class="btn btn-success">Submit Case</button>
            </div>
        </div>
    </div>
</div> --}}
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Submit a New Case</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route(getPrefix().'cases.store') }}" method="POST" enctype="multipart/form-data" id="modal-form">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Case Number</label>
                        <input type="text" name="case_number" class="form-control" value="{{ old('case_number') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Case Type</label>
                        <input type="text" name="case_type" class="form-control" value="{{ old('case_type') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>Open</option>
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                            <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Court Name</label>
                        <input type="text" name="court_name" class="form-control" value="{{ old('court_name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Filing Date</label>
                        <input type="date" name="filing_date" class="form-control" value="{{ old('filing_date') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Resolution Date</label>
                        <input type="date" name="resolution_date" class="form-control" value="{{ old('resolution_date') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Attachments</label>
                        <input type="file" name="attachments[]" class="form-control" multiple>
                        <small class="form-text text-muted">Allowed: PDF, JPG, PNG, DOCX</small>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="terms-checkbox" required>
                        <label class="form-check-label" for="terms-checkbox">
                            I agree to the <a href="#">Terms and Conditions</a>
                        </label>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="modal-form" class="btn btn-success">Submit Case</button>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Init DataTable
    $(document).ready(function () {
        $('#client-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url("/datatable/data") }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name: 'title' },
                { data: 'description', name: 'description' },
                { data: 'status', name: 'status' },
                { data: 'priority', name: 'priority' },
                {
                    data: 'id',
                    name: 'actions',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
                        return `<a href="/cases/${data}/edit" class="text-blue-600 hover:underline">Edit</a>`;
                    }
                }
            ]
        });
    });
</script>
@endsection