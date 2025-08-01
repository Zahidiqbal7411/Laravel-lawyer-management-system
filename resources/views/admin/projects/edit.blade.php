@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    LULU PULU IT <span class="fw-normal">Projects</span>
                </h4>
                <a href="#page_header"
                    class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                    data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>

            <!-- Header dropdown, status icons etc (unchanged) -->
            ...
        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <a href="{{ route(getPrefix() . 'projects.index') }}" class="breadcrumb-item">Projects</a>
                </div>

                <a href="#breadcrumb_elements"
                    class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                    data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>

            <!-- Support / Settings Dropdown (unchanged) -->
            ...
        </div>
    </div>

    <div class="content">
        <div class="row mt-2">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Update Project</h5>
                    </div>

                    <div class="card-body border-top">
                        <form action="{{ route(getPrefix() . 'projects.update', $project->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Title -->
                            <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Project Title:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        placeholder="Enter Project Title" value="{{ old('title', $project->title) }}">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Industry -->
                            <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Industry:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="industry"
                                        class="form-control @error('industry') is-invalid @enderror"
                                        placeholder="Enter Industry" value="{{ old('industry', $project->industry) }}">
                                    @error('industry')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Description:</label>
                                <div class="col-lg-10">
                                    <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Describe the project...">{{ old('description', $project->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Image -->
                            <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Image:</label>
                                <div class="col-lg-10">
                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text text-muted">Accepted formats: jpg, png. Max 2MB.</div>
                                    @if ($project->image)
                                        <div class="mt-2">
                                            <img src="{{ asset($project->image) }}" alt="Project Image" width="100"
                                                class="border rounded">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Technologies -->
                            <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Technologies (comma-separated):</label>
                                <div class="col-lg-10">
                                    <input type="text" name="technologies"
                                        class="form-control @error('technologies') is-invalid @enderror"
                                        placeholder="e.g. Laravel, Vue.js, MySQL"
                                        value="{{ old('technologies', is_array(json_decode($project->technologies)) ? implode(', ', json_decode($project->technologies)) : $project->technologies) }}">
                                    @error('technologies')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <!-- Progress -->

                            @unlessrole('User')
                                <div class="row mb-3">
                                    <label class="col-lg-2 col-form-label">Progress (%):</label>
                                    <div class="col-lg-10">
                                        <input type="number" name="progress"
                                            class="form-control @error('progress') is-invalid @enderror" min="0"
                                            max="100" value="{{ old('progress', $project->progress) }}">
                                        @error('progress')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            @endunlessrole

                            <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Progress (%):</label>
                                <div class="col-lg-10">
                                    <input type="number" name="progress"
                                        class="form-control @error('progress') is-invalid @enderror" min="0"
                                        max="100" value="{{ old('progress', $project->progress) }}">
                                    @error('progress')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                            <!-- Status -->
                            <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Status:</label>
                                <div class="col-lg-10">
                                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                                        <option value="pending"
                                            {{ old('status', $project->status) == 'pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="active"
                                            {{ old('status', $project->status) == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="paused"
                                            {{ old('status', $project->status) == 'paused' ? 'selected' : '' }}>Paused
                                        </option>
                                        <option value="completed"
                                            {{ old('status', $project->status) == 'completed' ? 'selected' : '' }}>
                                            Completed</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Approval Status (Admin Only) -->
                            @role('Admin|SUPER_ADMIN')
                                <div class="row mb-3">
                                    <label class="col-lg-2 col-form-label">Approval Status:</label>
                                    <div class="col-lg-10">
                                        <select name="approval_status" class="form-select @error('approval_status') is-invalid @enderror">
                                            <option value="pending"
                                                {{ old('approval_status', $project->approval_status) == 'pending' ? 'selected' : '' }}>Pending
                                            </option>
                                            <option value="approved"
                                                {{ old('approval_status', $project->approval_status) == 'approved' ? 'selected' : '' }}>Approved
                                            </option>
                                            <option value="rejected"
                                                {{ old('approval_status', $project->approval_status) == 'rejected' ? 'selected' : '' }}>Rejected
                                            </option>
                                        </select>
                                        @error('approval_status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            @endrole


                            <!-- Time Spent -->
                            <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Time Spent:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="time_spent"
                                        class="form-control @error('time_spent') is-invalid @enderror"
                                        placeholder="e.g. 10 hours or 300 mins"
                                        value="{{ old('time_spent', $project->time_spent) }}">
                                    @error('time_spent')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <!-- Submit -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">
                                    Update Project <i class="ph-check-square ms-2"></i>
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
    @if ($errors->any())
        <script>
            swalInit.fire({
                icon: 'error',
                title: '{{ $errors->first() }}',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif
@endsection
