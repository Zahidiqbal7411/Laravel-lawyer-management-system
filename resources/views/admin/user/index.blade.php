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

<!-- Create User Modal -->
{{-- <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form id="createUserForm">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Create New User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label for="userName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="userName" name="name" required>
          </div>

          <div class="mb-3">
            <label for="userEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="userEmail" name="email" required>
          </div>

          <div class="mb-3">
            <label for="userpassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="userpassword" name="password" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Create User</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div> --}}
<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form id="createUserForm">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Create New User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label for="userName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="userName" name="name" required>
          </div>

          <div class="mb-3">
            <label for="userEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="userEmail" name="email" required>
          </div>

          <div class="mb-3">
            <label for="userpassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="userpassword" name="password" required>
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

<script>
$(document).ready(function () {
  // Setup CSRF token for all ajax calls
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // Initialize DataTable
  var table = $('#usersTable').DataTable({
    processing: false,
    serverSide: true,
    ajax: {
      url: '{{ route("admin.index") }}',
      type: 'POST'
    },
    columns: [
      { data: 'id', name: 'id' },
      { data: 'name', name: 'name' },
      { data: 'email', name: 'email' },
      { data: 'created_at', name: 'created_at' }
    ]
  });

  // Handle form submission
  $('#createUserForm').on('submit', function(e) {
    e.preventDefault();

    const data = {
      name: $('#userName').val(),
      email: $('#userEmail').val(),
      password: $('#userpassword').val()
    };

    $.ajax({
      url: '{{ route("admin.store") }}',
      method: 'POST',
      data: data,
      success: function(response) {
        alert(response.message);

        // Properly hide modal using Bootstrap 5 API
        const modalEl = document.getElementById('createUserModal');
        const modal = bootstrap.Modal.getInstance(modalEl);
        modal.hide();

        $('#createUserForm')[0].reset();
        table.ajax.reload(null, false);

        // Fix blur issue by removing leftover backdrop
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
@endsection
