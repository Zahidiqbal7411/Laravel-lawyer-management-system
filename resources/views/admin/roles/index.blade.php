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
                    Roles And <span class="fw-normal">Permissions</span>
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
                    <a href="{{ route(getPrefix() .'roles.create') }}" class="breadcrumb-item">Role Create</a>
                    <span class="breadcrumb-item active">Horizontal</span>
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
                <h5 class="mb-0">Roles</h5>
            </div>
            <div class="card-body">
                Manage all roles here. You can edit or delete any role.
            </div>
            <table class="table datatable-row-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Role Name</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $index => $role)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td class="text-center">
                                <div class="d-inline-flex">
                                    <div class="dropdown">
                                        <a href="#" class="text-body" data-bs-toggle="dropdown">
                                            <i class="ph-list"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="{{ route(getPrefix() .'roles.edit', $role->id) }}" class="dropdown-item">
                                                <i class="ph-receipt me-2"></i>
                                                Edit
                                            </a>
                                            <a href="javascript:void(0);" class="dropdown-item text-danger" onclick="confirmDelete({{ $role->id }})">
                                                <i class="ph-trash me-2"></i> Delete
                                            </a>
                                            <form id="delete-form-{{ $role->id }}" action="{{ route(getPrefix() .'roles.destroy', $role->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>




    </div>
    <!-- /content area -->


    <!-- Footer -->

    <!-- /footer -->
@endsection


    <!-- SweetAlert2 -->
@section('scripts')
    <script>
        function confirmDelete(roleId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone.",
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('success'))
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success', // modern option
                type: 'success', // legacy or explicit use
                confirmButtonColor: '#3085d6'
            }).then(() => {
                // Optional: clear session flash by reloading or changing history
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            });
        @endif
    });
</script>
@endsection




