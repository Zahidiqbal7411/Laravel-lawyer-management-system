@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit Permissions for Role: <strong>{{ $role->name }}</strong></h5>
                </div>

                <div class="card-body border-top">
                    <form action="{{ route(getPrefix() .'assign_permissions.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Role Name (readonly) -->
                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label">Role</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" value="{{ $role->name }}" readonly>
                            </div>
                        </div>

                        <!-- Permissions -->
                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label">Assign Permissions:</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input @error('permissions') is-invalid @enderror"
                                                    type="checkbox"
                                                    name="permissions[]"
                                                    id="permission_{{ $permission->id }}"
                                                    value="{{ $permission->id }}"
                                                    {{ $role->permissions->contains('id', $permission->id) ? 'checked' : '' }}
                                                >
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
                                Update Permissions <i class="ph-check-square ms-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
