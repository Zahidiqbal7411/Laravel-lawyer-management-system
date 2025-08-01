@extends('layouts.app')

@section('styles')
@endsection

@section('content')
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Permissions <span class="fw-normal">Management</span>
            </h4>
            <a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
            </a>
        </div>
    </div>

    <div class="page-header-content d-lg-flex border-top">
        <div class="d-flex">
            <div class="breadcrumb py-2">
                <a href="{{ url('/') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                <a href="{{ route(getPrefix() .'permissions.index') }}" class="breadcrumb-item">Permissions</a>
                <span class="breadcrumb-item active">Edit</span>
            </div>
        </div>
    </div>
</div>

<!-- Content area -->
<div class="content">
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit Permission</h5>
                </div>

                <div class="card-body border-top">
                    <form action="{{ route(getPrefix() .'permissions.update', $permission->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Permission Name -->
                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label">Permission Name:</label>
                            <div class="col-lg-10">
                                <input type="text" name="name" id="name"
                                    value="{{ old('name', $permission->name) }}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter permission name" autocomplete="off">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">
                                Update Permission <i class="ph-pencil ms-2"></i>
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
@endsection
