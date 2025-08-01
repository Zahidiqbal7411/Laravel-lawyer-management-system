@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Assign Roles <span class="fw-normal">To User</span>
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
                    <a href="{{ route(getPrefix() .'assign_roles.index') }}" class="breadcrumb-item">Assign Roles</a>
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
                        <h5 class="mb-0"> Assign New Role</h5>
                    </div>

                    <div class="card-body border-top">
                        <form action="{{ route(getPrefix() .'assign_roles.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">User</label>
                                <div class="col-lg-10">
                                    <select name="user_id" id="user_id"
                                        class="form-control form-control-select2 @error('user_id') is-invalid @enderror">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="row mb-3">
                                <label class="col-lg-2 col-form-label">Assign Role:</label>
                                <div class="col-lg-10">
                                    <div class="row">
                                        @foreach ($roles as $role)
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input @error('role_id') is-invalid @enderror"
                                                        type="radio" name="role_id" id="role_{{ $role->id }}"
                                                        value="{{ $role->id }}"
                                                        {{ old('role_id') == $role->id ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="role_{{ $role->id }}">
                                                        {{ $role->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('role_id')
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
