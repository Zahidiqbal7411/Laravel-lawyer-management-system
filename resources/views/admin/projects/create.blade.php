@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <div class="page-header page-header-light shadow">



                <h4 class="page-title mb-0">
                    LULU PULU IT <span class="fw-normal">Projects</span>
                </h4>
                <a href="#page_header"
                    class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                    data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>
              <div class="content">
        <div class="row mt-2">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add New Project</h5>
                    </div>

                    <div class="card-body border-top">
                        <form action="{{ route(getPrefix() . 'projects.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Title -->
                            <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Project Title:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        placeholder="Enter Project Title" value="{{ old('title') }}">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Client Name -->
                            <!-- Client (Dropdown) -->
                            {{-- <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Client:</label>
                                <div class="col-lg-10">
                                    <select name="client_id" class="form-select @error('client_id') is-invalid @enderror">
                                        <option value="">-- Select Client --</option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}"
                                                {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                                {{ $client->name }} ({{ $client->email }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('client_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}


                            <!-- Industry -->
                            <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Industry:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="industry"
                                        class="form-control @error('industry') is-invalid @enderror"
                                        placeholder="Enter Industry" value="{{ old('industry') }}">
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
                                        placeholder="Describe the project...">{{ old('description') }}</textarea>
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
                                </div>
                            </div>

                            <!-- Project URL -->
                            {{-- <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Project URL:</label>
                                <div class="col-lg-10">
                                    <input type="url" name="project_url"
                                        class="form-control @error('project_url') is-invalid @enderror"
                                        placeholder="https://example.com" value="{{ old('project_url') }}">
                                    @error('project_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}

                            <!-- Technologies -->
                            <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Technologies (comma-separated):</label>
                                <div class="col-lg-10">
                                    <input type="text" name="technologies"
                                        class="form-control @error('technologies') is-invalid @enderror"
                                        placeholder="e.g. Laravel, Vue.js, MySQL" value="{{ old('technologies') }}">
                                    @error('technologies')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Budget -->
                            <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Budget:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="budget"
                                        class="form-control @error('budget') is-invalid @enderror" placeholder="e.g. $5000"
                                        value="{{ old('budget') }}">
                                    @error('budget')
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
                                            max="100" value="{{ old('progress', 0) }}">
                                        @error('progress')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            @endunlessrole




                            <!-- Status -->
                            {{-- <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Status:</label>
                                <div class="col-lg-10">
                                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                                        <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="Process" {{ old('status') == 'Process' ? 'selected' : '' }}>Process
                                        </option>
                                        <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>
                                            Completed</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}

                            <!-- Time Spent -->
                            {{-- <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Time Spent:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="time_spent"
                                        class="form-control @error('time_spent') is-invalid @enderror"
                                        placeholder="e.g. 10 hours or 300 mins" value="{{ old('time_spent') }}">
                                    @error('time_spent')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}


                            <!-- Submit -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">
                                    Submit Project <i class="ph-paper-plane-tilt ms-2"></i>
                                </button>
                            </div>
                        </form>

                    </div>

                </div>
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
