@extends('layouts.app')

@section('styles')
@endsection
@section('content')
    <!-- Inner content -->


    <!-- Page header -->
    <!-- Form inputs -->
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Assign <span class="fw-normal">Permissions</span>
                </h4>

                <a href="#page_header"
                    class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                    data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>


        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <a href="{{ route(getPrefix() .'assign_permissions.create') }}" class="breadcrumb-item">Assign Permissions</a>

                </div>

                <a href="#breadcrumb_elements"
                    class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                    data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>

            <div class="collapse d-lg-block ms-lg-auto" id="breadcrumb_elements">
                <div class="d-lg-flex mb-2 mb-lg-0">
                    <a href="#" class="d-flex align-items-center text-body py-2">
                        <i class="ph-lifebuoy me-2"></i>
                        Support
                    </a>

                    <div class="dropdown ms-lg-3">
                        <a href="#" class="d-flex align-items-center text-body dropdown-toggle py-2"
                            data-bs-toggle="dropdown">
                            <i class="ph-gear me-2"></i>
                            <span class="flex-1">Settings</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end w-100 w-lg-auto">
                            <a href="#" class="dropdown-item">
                                <i class="ph-shield-warning me-2"></i>
                                Account security
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ph-chart-bar me-2"></i>
                                Analytics
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ph-lock-key me-2"></i>
                                Privacy
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="ph-gear me-2"></i>
                                All settings
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /page header -->


    <!-- Content area -->
    <div class="content">






        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Assign Permissions Table</h5>
            </div>



            <div class="table-responsive">
                <table class="table table-xl">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Role Name</th>
                            <th>Permissions</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assign_permissions as $assign_permission)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $assign_permission->name }}</td>
                                <td>
                                    @if ($assign_permission->permissions->isNotEmpty())
                                        @foreach ($assign_permission->permissions as $permission)
                                            <span class="badge bg-success">{{ $permission->name }}</span>
                                        @endforeach
                                    @else
                                        <span class="text-muted">No permissions</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route(getPrefix() .'assign_permissions.edit', $assign_permission->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>

                                    <form id="delete-form-{{ $assign_permission->id }}"
                                        action="{{ route(getPrefix() .'assign_permissions.destroy', $assign_permission->id) }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')

                                        @foreach ($assign_permission->permissions as $permission)
                                            <input type="hidden" name="permissions[]" value="{{ $permission->id }}">
                                        @endforeach
                                    </form>


                                    <button type="button" class="btn btn-sm btn-danger"
                                        onclick="confirmDelete({{ $assign_permission->id }})">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>




    </div>
    <!-- /content area -->


    <!-- Footer -->

    <!-- /footer -->
@endsection

@section('scripts')
    <!-- SweetAlert2 -->
@section('scripts')
    <script>
        function confirmDelete(roleId) {
            Swal.fire({
                title: 'Are you sure?',
                text: ".",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + roleId).submit();
                }
            });
        }
    </script>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
                confirmButtonColor: '#3085d6'
            }).then(() => {
                // Clear from session via reload (if needed)
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            });
        @endif
    });
</script>
@endsection
