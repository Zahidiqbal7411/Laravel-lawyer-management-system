@extends('layouts.app')

@section('styles')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .table-avatar img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
@endsection

@section('contents')
    <div class="text-end mb-3">
        <button class="btn btn-success mt-3 m-0" data-bs-toggle="modal" data-bs-target="#createUserModal">
            + Add User
        </button>
    </div>

    <div class="container-fluid">
        <h2 class="mb-4">User Management</h2>
        <table id="usersTable" class="table table-bordered table-striped" style="width: 100%">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                </tr>
            </thead>
        </table>
    </div>

   
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form id="createUserForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Create New User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label for="userName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="userName" name="name" required>
                            </div>

                            <div class="col-md-6">
                                <label for="userEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="userEmail" name="email" required>
                            </div>

                            <div class="col-md-6">
                                <label for="userPhone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="userPhone" name="phone">
                            </div>

                            <div class="col-md-6">
                                <label for="userDob" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="userDob" name="dob">
                            </div>

                            <div class="col-md-6">
                                <label for="userGender" class="form-label">Gender</label>
                                <select class="form-control" id="userGender" name="gender">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="userStatus" class="form-label">Status</label>
                                {{-- <select class="form-control" id="userStatus" name="status" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                    <option value="2">Suspended</option>
                                </select> --}}
                                <select class="form-control" id="userStatus" name="status" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                    <option value="2">Suspended</option>
                                </select>

                            </div>

                            <div class="col-md-6">
                                <label for="userRole" class="form-label">Role</label>


                                <select class="form-control" id="userRole" name="role" required>
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name}}">{{ $role->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="col-md-6">
                                <label for="userPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="userPassword" name="password" required>
                            </div>

                            <div class="col-md-6">
                                <label for="userName" class="form-label">Photo</label>
                                <input type="file" class="form-control" id="userName" name="photo" required>
                            </div>

                            <div class="col-12">
                                <label for="userAddress" class="form-label">Address</label>
                                <input type="text" class="form-control" id="userAddress" name="address">
                            </div>

                            <div class="col-12">
                                <label for="userNotes" class="form-label">User Notes</label>
                                <textarea class="form-control" id="userNotes" name="notes" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create User</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <!-- OLD: likely causing 403 -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>



      <script>
    $(document).ready(function() {
        // Setup CSRF token for all ajax calls
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Initialize DataTable
        var table = $('#usersTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('admin.index') }}',
                type: 'POST'
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'created_at', name: 'created_at' }
            ]
        });

        // Handle form submission using FormData for file support
        $('#createUserForm').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this); // Includes all form fields including files

            $.ajax({
                url: '{{ route('admin.store') }}',
                method: 'POST',
                data: formData,
                contentType: false,  // Required for FormData
                processData: false,  // Required for FormData
                success: function(response) {
                    alert(response.message);

                    // Hide modal using Bootstrap 5
                    const modalEl = document.getElementById('createUserModal');
                    const modal = bootstrap.Modal.getInstance(modalEl);
                    modal.hide();

                    // Reset form and reload DataTable
                    $('#createUserForm')[0].reset();
                    table.ajax.reload(null, false);

                    // Remove any leftover modal overlay
                    $('.modal-backdrop').remove();
                    $('body').removeClass('modal-open');
                },
                error: function(xhr) {
                    let msg = xhr.responseJSON?.message || 'Something went wrong';
                    alert('Error: ' + msg);
                }
            });
        });
    });
</script>
<script>
        // $(document).ready(function() {
        //     // Setup CSRF token for all ajax calls
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     // Initialize DataTable
        //     var table = $('#usersTable').DataTable({
        //         processing: false,
        //         serverSide: true,
        //         ajax: {
        //             url: '{{ route('admin.index') }}',
        //             type: 'POST'
        //         },
        //         columns: [{
        //                 data: 'id',
        //                 name: 'id'
        //             },
        //             {
        //                 data: 'name',
        //                 name: 'name'
        //             },
        //             {
        //                 data: 'email',
        //                 name: 'email'
        //             },
        //             {
        //                 data: 'created_at',
        //                 name: 'created_at'
        //             }
        //         ]
        //     });

            // Handle form submission
        //     $('#createUserForm').on('submit', function(e) {
        //         e.preventDefault();

        //         const data = {
        //             name: $('#userName').val(),
        //             email: $('#userEmail').val(),
        //             password: $('#userpassword').val()
        //             phone: $('#phone').val()
        //             dob: $('#dob').val()
        //             gender: $('gender').val()
        //             role: $('role').val()
        //             address: $('address').val()
        //             notes: $('notes').val()
        //             photo: $('photo').val()


        //         };

        //         $.ajax({
        //             url: '{{ route('admin.store') }}',
        //             method: 'POST',
        //             data: data,
        //             success: function(response) {
        //                 alert(response.message);

        //                 // Properly hide modal using Bootstrap 5 API
        //                 const modalEl = document.getElementById('createUserModal');
        //                 const modal = bootstrap.Modal.getInstance(modalEl);
        //                 modal.hide();

        //                 $('#createUserForm')[0].reset();
        //                 table.ajax.reload(null, false);

        //                 // Fix blur issue by removing leftover backdrop
        //                 $('.modal-backdrop').remove();
        //                 $('body').removeClass('modal-open');
        //             },
        //             error: function(xhr) {
        //                 let msg = xhr.responseJSON?.message || 'Something went wrong';
        //                 alert('Error: ' + msg);
        //             }
        //         });
        //     });
        // });
//         $('#createUserForm').on('submit', function(e) {
//     e.preventDefault();

//     let formData = new FormData(this); // automatically picks up input names including files

//     $.ajax({
//         url: '{{ route('admin.store') }}',
//         method: 'POST',
//         data: formData,
//         contentType: false, // required for file upload
//         processData: false, // required for file upload
//         success: function(response) {
//             alert(response.message);

//             const modalEl = document.getElementById('createUserModal');
//             const modal = bootstrap.Modal.getInstance(modalEl);
//             modal.hide();

//             $('#createUserForm')[0].reset();
//             table.ajax.reload(null, false);

//             $('.modal-backdrop').remove();
//             $('body').removeClass('modal-open');
//         },
//         error: function(xhr) {
//             let msg = xhr.responseJSON?.message || 'Something went wrong';
//             alert('Error: ' + msg);
//         }
//     });
// });
</script>
    </script>
@endsection
