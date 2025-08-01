@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Assign Permissions <span class="fw-normal">To Role</span>
                </h4>
                <a href="#page_header"
                    class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                    data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>
            ...
        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="{{ url('/') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <a href="#" class="breadcrumb-item">Assign Permissions</a>
                </div>

                <a href="#breadcrumb_elements"
                    class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                    data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>
            ...
        </div>
    </div>

    <!-- Content area -->
    <div class="content">
        <div class="row mt-2">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"> New Assign Permission</h5>
                    </div>

                    <div class="card-body border-top">
                        <form action="{{ route(getPrefix() .'assign_permissions.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Assign Permission Name -->
                            <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Role</label>
                                <div class="col-lg-10">
                                    <select name="role_id" id="role_id"
                                        class="form-control form-control-select2 @error('type') is-invalid @enderror">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }} >
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Assign Permissions:</label>
                                <div class="col-lg-10">
                                    <div class="row">
                                        @foreach ($permissions as $permission)
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input @error('permissions') is-invalid @enderror"
                                                        type="checkbox" name="permissions[]"
                                                        id="permission_{{ $permission->id }}" value="{{ $permission->id }}"
                                                        {{ is_array(old('permissions')) && in_array($permission->id, old('permissions')) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="permission_{{ $permission->id }}">
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('permissions')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <!-- Submit Button -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">
                                    Submit Assign Permission <i class="ph-paper-plane-tilt ms-2"></i>
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
